<?php

namespace Database\Seeders;

use App\Models\Question;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $questions = [
            [
                'question' => 'Education',
                'options' => json_encode(['illiterate', 'literate', 'school grad.', 'college/university grad.']),
                'group' => 'demographics',
            ],
            [
                'question' => 'Visit Type',
                'options' => json_encode(['First-time', 'Follow-up', 'OPD', 'Emergency']),
                'group' => 'demographics',
            ],
            [
                'question' => 'Exclusively Breastfed',
                'options' => json_encode(['Yes', 'No']),
                'group' => 'demographics',
            ],
            [
                'question' => 'Primary Complaint',
                'options' => json_encode(['loose stools', 'Diarrhea']),
                'group' => 'presenting complaints',
            ],
            [
                'question' => 'Start Date',
                'options' => json_encode([]),
                'group' => 'presenting complaints',
            ],
            [
                'question' => 'End Date',
                'options' => json_encode([]),
                'group' => 'presenting complaints',
            ],
            [
                'question' => 'Frequency',
                'options' => json_encode(['1', '2', '3', '4', '5-10', '10-15', '15-20', '>20']),
                'group' => 'presenting complaints',
            ],
            [
                'question' => 'Associated Complaints',
                'options' => json_encode([
                    'nausea', 'vomiting', 'abdominal pain', 'fever', 'alternate with constipation', 'incomplete evacuation', 'urge to pass stool', 'mouth ulcer', 'joint pain', 'rash', 'Other'
                ]),
                'group' => 'presenting complaints',
            ],
            [
                'question' => 'Amount of Stool',
                'options' => json_encode(['small', 'normal', 'large']),
                'group' => 'presenting complaints',
            ],
            [
                'question' => 'Consistency',
                'options' => json_encode(['watery', 'pasty']),
                'group' => 'presenting complaints',
            ],
            [
                'question' => 'Contents',
                'options' => json_encode(['blood', 'mucous', 'fat', 'difficult to flush']),
                'group' => 'presenting complaints',
            ],
            [
                'question' => 'Blood from any other site',
                'options' => json_encode(['Yes', 'No']),
                'group' => 'presenting complaints',
            ],
            [
                'question' => 'Lump in back passage',
                'options' => json_encode(['Yes', 'No']),
                'group' => 'presenting complaints',
            ],
            [
                'question' => 'Past similar episode(s) of diarrhea',
                'options' => json_encode([
                    'last_episode' => [
                        'within 1 month', 'within 3 months', 'within 6 months', 'within 12 months', 'more than 12 months'
                    ],
                    'condition' => [
                        'serious', 'non-serious'
                    ]
                ]),
                'group' => 'past history',
            ],
            [
                'question' => 'Previous Hopitalization due to diarrhea',
                'options' => json_encode(['Yes', 'No']),
                'group' => 'past history',
            ],
            [
                'question' => 'Vaccination history',
                'options' => json_encode(['All completed', 'Rotavirus vaccine', 'measles vaccine']),
                'group' => 'vaccination history',
            ],
            [
                'question' => 'Drinking water (home)',
                'options' => json_encode([
                    'Boiled, Unboiled',  'tap water', 'bottled water',
                    'RO water', 'other source'
                ]),
                'group' => 'lifestyle',
            ],
            [
                'question' => 'Type of latrine',
                'options' => json_encode(['western', 'eastern', 'forest', 'river/stream', 'digging hole']),
                'group' => 'lifestyle',
            ],
            [
                'question' => 'Suspected Food',
                'options' => json_encode([]),
                'group' => 'lifestyle',
            ],
            [
                'question' => 'Regular soap use',
                'options' => json_encode(['Yes', 'No']),
                'group' => 'lifestyle',
            ],
            [
                'question' => 'Animals at home',
                'options' => json_encode(['Yes', 'No']),
                'group' => 'lifestyle',
            ],
            [
                'question' => 'Systemic review',
                'options' => json_encode(['not significant', 'significant']),
                'group' => 'systemic review',
            ],
            [
                'question' => 'Medications currently in use',
                'options' => json_encode(['None', 'ORS', 'probiotic', 'zinc', 'Antibiotic']),
                'group' => 'treatment history',
            ],
            [
                'question' => 'Compliance to medicine',
                'options' => json_encode(['As per doctors advice', 'Stopped medicine him/herself']),
                'group' => 'treatment history',
            ],
            [
                'question' => 'Blood transfusion',
                'options' => json_encode(['Yes', 'No']),
                'group' => 'treatment history',
            ],
            [
                'question' => 'Travel history',
                'options' => json_encode(['local', 'international']),
                'group' => 'travel history',
            ],
            [
                'question' => 'Family History',
                'options' => json_encode(['no history', 'similar complaint in family']),
                'group' => 'family history',
            ],
            [
                'question' => 'General',
                'options' => json_encode(['Alert', 'Lethargic/Unconcious', 'restless/irritable', 'sunken eyes']),
                'group' => 'diarrhea related examination',
            ],
            [
                'question' => 'Systemic infection signs',
                'options' => json_encode(['Febrile', 'afebrile', 'other']),
                'group' => 'diarrhea related examination',
            ],
            [
                'question' => 'Abdominal / Perianal examination',
                'options' => json_encode(['pain on palpation', 'distention', 'other']),
                'group' => 'diarrhea related examination',
            ],
            [
                'question' => 'Able to drink',
                'options' => json_encode(['Eagerly', 'poorly or unable', 'normally']),
                'group' => 'diarrhea related examination',
            ],
            [
                'question' => 'Skin turgor',
                'options' => json_encode(['Very slowly', 'slowly', 'immediately']),
                'group' => 'diarrhea related examination',
            ],
            [
                'question' => 'Dehydration',
                'options' => json_encode(['No dehydration', 'some dehydration', 'severe dehydration']),
                'group' => 'diarrhea related examination',
            ],
            [
                'question' => 'Laboratory history',
                'options' => json_encode([
                    'CBC', 'UCE', [
                        'Stool DR', [
                            'Mucous', 'Red cells', 'occult blood', 'Bacteria', 'Ova', 'parasite', 'Stool CS: Ecoli', 'other organism'
                        ]
                    ]
                ]),
                'group' => 'laboratory history',
            ],
            [
                'question' => 'Final diagnosis',
                'options' => json_encode([
                    'Acute', 'Persistent', 'Chronic', 'Mild', 'moderate', 'severe', 'Inflammatory diarrhea', 'infectious diarrhea', 'bacterial', 'viral', 'parasitic', 'Non inflammatory diarrhea', 'Osmotic diarrhea', 'Antibiotic associated diarrhea', 'secretory diarrhea', 'Other diarrhea'
                ]),
                'group' => 'final diagnosis',
            ],
            [
                'question' => 'Confirmation of diagnosis',
                'options' => json_encode([
                    'clinically confirmed', 'laboratory confirmed', 'epidemiologically confirmed'
                ]),
                'group' => 'confirmation of diagnosis',
            ],
            [
                'question' => 'Differential diagnosis',
                'options' => json_encode(['Yes', 'No']),
                'group' => 'differential diagnosis',
            ],
            [
                'question' => 'Lump in back passage',
                'options' => json_encode([
                    'dosage' => [],
                    'advice' => [],
                    'labs' => []
                ]),
                'group' => 'precription/lab advice',
            ],

        ];
        Question::create();
    }
}
