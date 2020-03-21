<?php
/**
 * Created by PhpStorm.
 * Filename: UserCreatorRepository.php
 * User: Kamweru George (notrexbias@outlook.com)
 * Github: NotreXbias (github.com/notrexbias)
 * Date: 3/21/2020
 * Time: 23:32
 */
namespace App\Domain\User\Repository;

use App\Domain\User\Data\UserCreateData;
use PDO;

/**
 * Repository.
 */
class UserCreatorRepository
{
    /**
     * @var PDO The database connection
     */
    private $connection;

    /**
     * Constructor.
     *
     * @param PDO $connection The database connection
     */
    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    /**
     * Insert user row.
     *
     * @param UserCreateData $user The user
     *
     * @return int The new ID
     */
    public function insertUser(UserCreateData $user): int
    {
        $row = [
            'username' => $user->username,
            'first_name' => $user->firstname,
            'last_name' => $user->lastname,
            'email' => $user->email,
            'password' => $user->password
        ];

        $sql = "INSERT INTO users SET 
                username=:username, 
                firstname=:first_name, 
                lastname=:last_name, 
                email=:email, 
                password=:password;";

        $this->connection->prepare($sql)->execute($row);

        return (int)$this->connection->lastInsertId();
    }
}