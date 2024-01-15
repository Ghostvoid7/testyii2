<?php

namespace app\models;
use yii\base\Model;
use yii\db\Query;

class ReportBid extends Model
{
    public $report;

    public function create_report($startDate, $endDate)
    {
        $report = [];

        $query = (new Query())
            ->select(['Agent.name','Bid.category'])
            ->from('Bid')
            ->rightJoin('Agent', 'Bid.agent_id = Agent.id')
            ->where(['between', 'decided_at', $startDate, $endDate])
            ->andWhere(['status' => 'Вирішена']);

        $records = $query->all();

        if (!empty($records)) {
            foreach ($records as $bid) {
                if (array_key_exists($bid['name'], $report)) {
                    $report[$bid['name']][$bid['category']]++;
                    $report[$bid['name']]['Усього']++;
                } else {
                    $report[$bid['name']] = ['Відключення' => 0, 'Перевірка/здешевлення' => 0, 'Тех. питання' => 0, 'Інше' => 0, 'Усього' => 0];
                    $report[$bid['name']][$bid['category']]++;
                    $report[$bid['name']]['Усього']++;
                }
            }
        }


        $this->report = $report;
    }
}