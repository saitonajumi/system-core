<?php

namespace App\GraphQL\Mutations;

use App\Models\User;

final class DeleteUser
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        $id = $args['id'];

        $users = User::query()
            ->where('id', (int)$id)->delete();

        return [
            'success' => true,
            'message' => 'successfully delete the record.',
            'data' => $users,
        ];
    }
}
