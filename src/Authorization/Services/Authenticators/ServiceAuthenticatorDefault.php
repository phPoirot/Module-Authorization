<?php
namespace Module\Authorization\Services\Authenticators;

use Poirot\AuthSystem\Authenticate\Authenticator;
use Poirot\AuthSystem\Authenticate\Identifier\aIdentifier;
use Poirot\AuthSystem\Authenticate\Identifier\IdentifierHttpBasicAuth;
use Poirot\AuthSystem\Authenticate\RepoIdentityCredential\IdentityCredentialDigestFile;
use Poirot\Ioc\Container\Service\aServiceContainer;


class ServiceAuthenticatorDefault
    extends aServiceContainer
{
    /**
     * Create Service
     *
     * @return Authenticator
     */
    function newService()
    {
        $realm      = aIdentifier::DEFAULT_REALM;
        $adapter    = new IdentityCredentialDigestFile;;
        $identifier = new IdentifierHttpBasicAuth;
        $identifier->setCredentialAdapter($adapter);
        $identifier->setRealm($realm);

        $authenticator = new Authenticator($identifier, $adapter);
        return $authenticator;
    }
}