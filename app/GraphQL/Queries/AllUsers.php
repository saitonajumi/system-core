<?php

namespace App\GraphQL\Queries;

use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

final class AllUsers
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */

    public function __invoke($_, array $args)
    {
        // TODO implement the resolver
        $first = $args['first'] ?? 10;
        $page = $args['page'] ?? 1;
        $student = $args['student'] ?? '';
        $registration_type = $args['registration_type'] ?? '';
        $status = $args['status'] ?? '';

        $users = [];
        $usersData = [];
        $collectUsers = [];

        $users = User::query()
            ->with([
                'otherInfo',
                'academicInfo',
                'contactInfos',
                'appointments',
                'guidance',
                'instructors',
                'chats',
            ])
            ->where('name', 'ILIKE', '%' . $student . '%')
            ->orderBy('id')
            ->get();

        if ($users) {
            foreach ($users as $user) {
//                $user['other_infos'] = $this->getOtherInfos($user['id']);
                $collectUsers[] = $user;
            }
        }

        if ($collectUsers) {
            $collectedUsers = collect($collectUsers);
            if ($registration_type) {
                $collectedUsers = $collectedUsers
                    ->filter(function ($item) use ($registration_type) {
                        // Filter by student number
                        $hasItem = Str::contains(
                            strtolower(Arr::get($item, 'registration_type')),
                            strtolower($registration_type)
                        );
                        if ($hasItem) {
                            return $item;
                        }
                    });
            }
            if ($status) {
                $collectedUsers = $collectedUsers
                    ->filter(function ($item) use ($status) {
                        // Filter by student number
                        $hasItem = Str::contains(
                            strtolower(Arr::get($item, 'status')),
                            strtolower($status)
                        );
                        if ($hasItem) {
                            return $item;
                        }
                    });
            }
            if (isset($page) && isset($first)) {
                $collectedUsers = $this->paginate($collectedUsers, $first, $page);
                $usersData = collect(Arr::get($collectedUsers->toArray(), 'data', []))
                    ->values();

                $paginatorInfo = [
                    'count' => $collectedUsers->count(),
                    'total' => $collectedUsers->total()
                ];
            } else {
                $usersData = $collectedUsers->values();
            }
        }

        return [
            'success' => true,
            'message' => 'successfully fetch list of Users',
            'data' => $usersData,
            'paginator_info' => $paginatorInfo ?? '',
            'filter' => []
        ];
    }

    public function paginate($items, $first, $page): LengthAwarePaginator
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $first), $items->count(), $first, $page);
    }
}
