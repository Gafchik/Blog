<?php

namespace App\Http\Classes\LogicalModels\Publication;

use App\Http\Classes\Structure\CDateTime;
use App\Http\DTO\Publication\PublicationDto;
use App\Http\Facades\UserInfoFacade;
use \App\Models\MySql\Blog\Publication as PublicationTable;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;

class PublicationModel
{
    public function __construct(
        private PublicationTable $publication,
        private User $userTable
    ){}

    public function delete(PublicationDto $data): void
    {
        $this->publication
            ->where('id',$data->id)
            ->delete();
    }
    public function send(PublicationDto $data): void
    {
        $user = UserInfoFacade::getUserInfo();
        $this->publication
            ->insert([
                'title' => $data->title,
                'text' => $data->text,
                'user_id' => $user->id,
                'created_at' => CDateTime::getCurrentDate(),
                'updated_at' => CDateTime::getCurrentDate(),
            ]);
    }

    public function getMy(): array
    {
        $user = UserInfoFacade::getUserInfo();
        return $this->getBasePublicationQuery()
            ->where('publication.user_id',$user->id)
            ->get()
            ->toArray();
    }
    public function getAll(): array
    {
        return $this->getBasePublicationQuery()
            ->get()
            ->toArray();
    }
    private function getBasePublicationQuery(): Builder
    {
        return $this->publication
            ->from($this->publication->getTable(). ' as publication')
            ->leftJoin($this->userTable->getTable() . ' as userTable',
                'userTable.id',
                '=',
                'publication.user_id'
            )
            ->select([
                'publication.id',
                'publication.title',
                'publication.text',
                'publication.user_id',
                'publication.created_at',
                'publication.updated_at',
                'userTable.name as user_name',
            ])
            ->orderByDesc('publication.created_at');
    }
}
