<?php

namespace App\Voter;

use App\Entity\Employee;
use App\Entity\Office;
use App\Enum\Roles;
use App\Request\Office\OfficeRequest;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;
use Symfony\Bundle\SecurityBundle\Security;

class OfficeVoter extends Voter
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

        if (!$subject instanceof Office) {
            if(!$subject instanceof OfficeRequest){
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

        /** @var Office $office */
        $office = $subject;

        return match($attribute) {
            self::VIEW => $this->canView($office, $user),
            self::EDIT => $this->canEdit($office, $user),
            self::DELETE => $this->canDelete($user),
            self::CREATE => $this->canCreate($user),
            self::LIST=>$this->canList($user),
            default => throw new \LogicException('This code should not be reached!')
        };
    }

    private function canView(Office $office, Employee $user): bool
    {
        if ($this->security->isGranted(Roles::Admin)){
            return true;
        } else {
            if ($this->security->isGranted(Roles::User)){
                if($user === $office->getEmployee()) {
                    return true;
                }
            }
        }
        return false;
    }

    private function canEdit(Office $office, Employee $user): bool
    {
        if ($this->security->isGranted(Roles::Admin)){
            return true;
        } else {
            if ($this->security->isGranted(Roles::User)){
                if($user === $office->getEmployee()) {
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