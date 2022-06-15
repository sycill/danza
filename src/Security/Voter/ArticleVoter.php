<?php

namespace App\Security\Voter;

use App\Entity\User;
use App\Entity\Article;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;

class ArticleVoter extends Voter
{
    public const VIEW = 'ARTICLE_VIEW';
    public const EDIT = 'ARTICLE_EDIT';
    public const DELETE = 'ARTICLE_DELETE';

    private function __construct(Security $security)
    {
        $this->security = $security;
    }
    // Permet de vérifier les permissions de l'utilisateur

    protected function supports(string $attribute, $article): bool
    {
        return in_array($attribute, [self::VIEW, self::EDIT, self::DELETE])
            && $article instanceof \App\Entity\Article;
    }

    protected function voteOnAttribute(string $attribute, $article, TokenInterface $token): bool
    {
        $user = $token->getUser();
        // si l'utilisateur n'est pas identifié, refuser l'accès
        if (!$user instanceof UserInterface) {
            return false;
        }
        // si l'utilisateur a le rôle admin, donner accès

        if ($this->security->isGranted('ROLE_ADMIN')) {
            return true;
        }

        if (null === $article->getUser()) {
            return false;
        }
        // si l'article n'a pas d'auteur, refuser l'accès

        // ... (check conditions and return true to grant permission) ...
        switch ($attribute) {

            case self::VIEW:
                // logic to determine if the user can VIEW
                // Si l'utilisateur connecté est l'auteur de l'article alors il peut voir les articles
                if ($user === $article->getUser()) {
                    return true;
                }
                break;

            case self::EDIT:
                // Si l'utilisateur connecté est l'auteur de l'article alors il peut mettre à jour l'article
                if ($user === $article->getUser()) {
                    return true;
                }
                break;
            case self::DELETE:
                // Si l'utilisateur connecté est l'auteur de l'article alors il peut supprimer l'article
                // return true or false
                if ($user === $article->getUser()) {
                    return true;
                }
                break;
        }

        return false;
    }
}
