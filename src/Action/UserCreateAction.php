<?php
/**
 * Created by PhpStorm.
 * Filename: UserCreateAction.php
 * User: Kamweru George (notrexbias@outlook.com)
 * Github: NotreXbias (github.com/notrexbias)
 * Date: 3/21/2020
 * Time: 23:12
 */


namespace App\Action;

use App\Domain\User\Data\UserCreateData;
use App\Domain\User\Service\UserCreator;
use Slim\Http\Response;
use Slim\Http\ServerRequest;

final class UserCreateAction
{
    private $userCreator;

    public function __construct(UserCreator $userCreator)
    {
        $this->userCreator = $userCreator;
    }

    public function __invoke(ServerRequest $request, Response $response): Response
    {
        // Collect input from the HTTP request
        $data = (array)$request->getParsedBody();

        // Mapping (should be done in a mapper class)
        $user = new UserCreateData();
        $user->username = $data['username'];
        $user->firstname = $data['first_name'];
        $user->lastname = $data['last_name'];
        $user->email = $data['email'];
        $user->password = $data['password'];

        // Invoke the Domain with inputs and retain the result
        $userId = $this->userCreator->createUser($user);

        // Transform the result into the JSON representation
        $result = [
            'user_id' => $userId
        ];

        // Build the HTTP response
        return $response->withJson($result)->withStatus(201);
    }
}