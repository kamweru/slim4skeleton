<?php
/**
 * Created by PhpStorm.
 * Filename: UserCreateData.php
 * User: Kamweru George (notrexbias@outlook.com)
 * Github: NotreXbias (github.com/notrexbias)
 * Date: 3/21/2020
 * Time: 23:33
 */
namespace App\Domain\User\Data;

final class UserCreateData
{
    /** @var string */
    public $username;

    /** @var string */
    public $firstName;

    /** @var string */
    public $lastName;

    /** @var string */
    public $email;
}