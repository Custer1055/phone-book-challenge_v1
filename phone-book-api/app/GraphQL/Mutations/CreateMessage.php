<?php

namespace App\GraphQL\Mutations;

use App\Models\Message;
use Illuminate\Support\Facades\Log;

class CreateMessage
{
    public function __invoke($rootValue, array $args, $context, $resolveInfo)
    {
        $message = new Message([
            'contact_id' => $args['contact_id'],
            'type' => $args['type'],
            'body' => $args['body'],
            'user_id' => $args['user_id'],
            'status' => 'QUEUED',
        ]);

        if ($message->user_id == null) {
            return new \Exception('User_id is required');
        }

        $message->save();

        return $message;
    }
}
