<?php
/**
 * Created by PhpStorm.
 * Filename: UserCreator.php
 * User: Kamweru George (notrexbias@outlook.com)
 * Github: NotreXbias (github.com/notrexbias)
 * Date: 3/21/2020
 * Time: 23:32
 */
namespace App\Domain\User\Service;

use App\Domain\User\Data\UserCreateData;
use App\Domain\User\Repository\UserCreatorRepository;
use UnexpectedValueException;

/**
 * Service.
 */
final class UserCreator
{
    /**
     * @var UserCreatorRepository
     */
    private $repository;

    /**
     * The constructor.
     *
     * @param UserCreatorRepository $repository The repository
     */
    public function __construct(UserCreatorRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Create a new user.
     *
     * @param UserCreateData $user The user data
     *
     * @return int The new user ID
     */
    public function createUser(UserCreateData $user): int
    {
        // Validation
        if (empty($user->username)) {
            throw new UnexpectedValueException('Username required');
        }

        // Insert user
        $userId = $this->repository->insertUser($user);

        // Logging here: User created successfully

        return $userId;
    }
}