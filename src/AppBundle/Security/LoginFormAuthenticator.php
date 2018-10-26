<?php

namespace AppBundle\Security;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\Security\Core\Exception\CustomUserMessageAuthenticationException;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Guard\Authenticator\AbstractFormLoginAuthenticator;


class LoginFormAuthenticator extends AbstractFormLoginAuthenticator
{
    /**
     * @var \Doctrine\ORM\EntityManager
     */
    private $em;
    /**
     * @var \Symfony\Component\Routing\RouterInterface
     */
    private $router;
    private $failMessage = 'Nieprawidłowe dane';

    public function __construct(RouterInterface $router, EntityManagerInterface $em)
    {
        $this->router = $router;
        $this->em = $em;
    }

    protected function getLoginUrl()
    {
        return $this->router->generate('login');
    }

    /**
     * Wywoływane przy każdym requeście, Tu muszę odczytać dane autoryzacji z requestu i je zwrócić
     *
     * This will be called on every request and your job is to read the token (or whatever your "authentication"
     * information is) from the request and return it.
     * These credentials are later passed as the first argument of getUser().
     */
    public function getCredentials(Request $request)
    {
        if ($request->getPathInfo() != '/login' || !$request->isMethod('POST')) {
            return;
        }

        return array(
            'username' => $request->request->get('username'),
            'password' => $request->request->get('password'),
        );
    }

    /**
     * Dla parametru $credentials wrzucane jest to co zwraca powyższa metoda getCredentials
     *
     * The $credentials argument is the value returned by getCredentials(). Your job is to return an object that
     * implements UserInterface. If you do, then checkCredentials() will be called. If you return null (or throw an
     * AuthenticationException) authentication will fail.
     */
    public function getUser($credentials, UserProviderInterface $userProvider)
    {
        return $userProvider->loadUserByUsername($credentials['username']);
    }

    /**
     * Jeśli używam formularza logowania, to tu sprawdzam poprawność hasła
     *
     * If getUser() returns a User object, this method is called. Your job is to verify if the credentials are correct.
     * For a login form, this is where you would check that the password is correct for the user. To pass authentication,
     * return true. If you return anything else (or throw an AuthenticationException), authentication will fail.
     */
    public function checkCredentials($credentials, UserInterface $user)
    {
        if ($user->getPassword() === $credentials['password']) {
            return true;
        }
        throw new CustomUserMessageAuthenticationException($this->failMessage);
    }

    /**
     * Gdy sukces autentyfikacji
     *
     * This is called after successful authentication and your job is to either return a Response object that will be
     * sent to the client or null to continue the request (e.g. allow the route/controller to be called like normal).
     */
    public function onAuthenticationSuccess(Request $request, TokenInterface $token, $providerKey)
    {
        $url = $this->router->generate('homepage');

        return new RedirectResponse($url);
    }

    /**
     * Gdy fail autentyfikacji
     *
     * This is called if authentication fails. Your job is to return the Response object that should be sent to the client.
     * The $exception will tell you what went wrong during authentication.
     */
    public function onAuthenticationFailure(Request $request, AuthenticationException $exception)
    {
        $request->getSession()->set(Security::AUTHENTICATION_ERROR, $exception);
        $url = $this->router->generate('login');

        return new RedirectResponse($url);
    }

    /**
     * Wywoływane gdy user próbuje dostać się w url który wymaga autentyfikacji, ale gdy user nie dostarczył danych logowania
     *
     * This is called if the client accesses a URI/resource that requires authentication, but no authentication details
     * were sent. Your job is to return a Response object that helps the user authenticate (e.g. a 401 response that says
     * "token is missing!").
     */
    public function start(Request $request, AuthenticationException $authException = null)
    {
        $url = $this->router->generate('login');

        return new RedirectResponse($url);
    }

    /**
     * If you want to support "remember me" functionality, return true from this method. You will still need to activate
     * remember_me under your firewall for it to work. Since this is a stateless API, you do not want to support "remember me" f
     * unctionality in this example.
     */
    public function supportsRememberMe()
    {
        return false;
    }

    /**
     * Można usunąć tę metodę jeśli nic nie będzie sprawdzać w przychodzącym requeście. Mogłaby sprawdzać, dane z nagłówka, jeśli token.
     *
     * Called on every request to decide if this authenticator should be
     * used for the request. Returning false will cause this authenticator
     * to be skipped.
     */
    public function supports(Request $request)
    {
        return true;
    }
}