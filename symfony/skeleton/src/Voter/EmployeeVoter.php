<?php

namespace App\Voter;

use App\Entity\Employee;
use App\Enum\Roles;
use App\Request\Employee\EmployeeRequest;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;
use Symfony\Bundle\SecurityBundle\Security;

class EmployeeVoter extends Voter
{
    const VIEW = 'view';
    const EDIT = 'edit';
    const DELETE = 'delete';
    const CREATE = 'create';
    const LIST = 'list';

    public function __construct(private Security $security)
    {
    }

    protected function supports(string $attribute, mixed $subject): bool
    {
        if (!in_array($attribute, [self::VIEW, self::EDIT,self::CREATE,self::DELETE,self::LIST])) {

            return false;
        }

        if ($attribute === self::LIST && !$subject){

            return true;
        }

        if (!$subject instanceof Employee) {
            if(!$subject instanceof EmployeeRequest){

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

        /** @var Employee $employee */
        $employee = $subject;

        return match($attribute) {
            self::VIEW => $this->canView($employee, $user),
            self::EDIT => $this->canEdit($employee, $user),
            self::DELETE => $this->canDelete($user),
            self::CREATE => $this->canCreate($user),
            self::LIST=>$this->canList($user),
            default => throw new \LogicException('This code should not be reached!')
        };
    }

    private function canView(Employee $employee, Employee $user): bool
    {
        if ($this->security->isGranted(Roles::Admin)){

            return true;
        } else {
            if ($this->security->isGranted(Roles::User)){
                if($user->getId() === $employee->getId()) {

                    return true;
                }
            }
        }

        return false;
    }

    private function canEdit(Employee $employee, Employee $user): bool
    {
        if ($this->security->isGranted(Roles::Admin)){

            return true;
        } else {
            if ($this->security->isGranted(Roles::User)){
                if($user->getId() === $employee->getId()) {

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