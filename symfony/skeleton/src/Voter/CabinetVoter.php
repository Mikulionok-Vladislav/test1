<?php

namespace App\Voter;

use App\Entity\Cabinet;
use App\Entity\Employee;
use App\Enum\Roles;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;


class CabinetVoter extends Voter
{
    const VIEW = 'view';
    const EDIT = 'edit';
    const DELETE = 'delete';
    const CREATE = 'create';
    const LIST = 'list';

    public function __construct(
        private Security $security,
    ) {
    }
    protected function supports(string $attribute, mixed $subject): bool
    {
        if (!in_array($attribute, [self::VIEW, self::EDIT,self::CREATE,self::DELETE,self::LIST])) {
            return false;
        }

        if ($attribute === self::LIST && !$subject){
            return true;
        }

        if (!$subject instanceof Cabinet) {
            if(!$subject instanceof CabinetRequest){
                return false;
            }
        }

        return true;
    }

    protected function voteOnAttribute(string $attribute, mixed $subject, TokenInterface $token): bool
    {
        $user = $token->getUser();

        if (!$user instanceof Employee) {
            return false;
        }

        /** @var Cabinet $cabinet */
        $cabinet = $subject;

        return match($attribute) {
            self::VIEW => $this->canView($cabinet, $user),
            self::EDIT => $this->canEdit($cabinet, $user),
            self::DELETE => $this->canDelete($user),
            self::CREATE => $this->canCreate($user),
            self::LIST=>$this->canList($user),
            default => throw new \LogicException('This code should not be reached!')
        };
    }

    private function canView(Cabinet $cabinet, Employee $user): bool
    {
        if ($this->security->isGranted(Roles::Admin)){
            return true;
        } else {
            if ($this->security->isGranted(Roles::User)){
                if($user === $cabinet->getEmployee()) {
                    return true;
                }
            }
        }
        return false;
    }

    private function canEdit(Cabinet $cabinet, Employee $user): bool
    {
        if ($this->security->isGranted(Roles::Admin)){
            return true;
        } else {
            if ($this->security->isGranted(Roles::User)){
                if($user === $cabinet->getEmployee()) {
                    return true;
                }
            }
        }
        return false;
    }

    private function canDelete(Employee $user):bool
    {
        if ($this->security->isGranted(Roles::Admin)){
            return true;
        }
        return false;
    }

    private function canCreate(Employee $user):bool
    {
        if ($this->security->isGranted(Roles::Admin)){
            return true;
        }
        return false;
    }

    private function canList(Employee $user)
    {
        if ($this->security->isGranted(Roles::Admin)){
            return true;
        }
        return false;
    }
}