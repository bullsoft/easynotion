<?php
namespace EasyNotion\Http;
use EasyNotion\Entity\Database as DbEntity;
use EasyNotion\Property\{
    Sort, Filter,
};

class Database
{
    public function __construct(
        private Client $client,
    )
    {
    }

    public function get(string $id)
    {
        $uri = "databases/{$id}";
        return $this->client->get($uri)->result();
    }

    public function query(string $id, ?Filter $filter = null, ?Sort $sort = null, int $pageSize = 20, ?string $start = null)
    {
        $page = new Request\Pagination($start, $pageSize);
        $opts = $page->__toArray();
        if($filter !== null) {
            $opts += $filter->__toArray();
        }
        if(!empty($sorts)) {
            $opts += $sort->__toArray();
        }
        $uri = "databases/{$id}/query";
        var_dump(json_encode($opts));
        return $this->client->post($uri, [
            'body' => json_encode($opts),
        ])->result();
    }
}