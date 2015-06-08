<?php

namespace App\Controller;

class HarmonogramsController extends AppController
{

    public function index()
    {
        $options=array(
            'joins' =>
                array(
                    array(
                        'table' => 'schedules',
                        'alias' => 'Schedules',
                        'type' => 'left',
                        'foreignKey' => false,
                        'conditions'=> array('Harmonograms.chedule_id = Schedules.schedule_id')
                    ),

                )
        );

        $harmonograms = $this->Harmonograms->find('all', $options);

        //$harmonograms = $this->Harmonograms->find('all', ['contain' => ['Schedules']]);
        $this->set(compact('harmonograms'));
    }
}