<?php

namespace Database\Seeders;

use App\Models\Question;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $groups = [
            'presenting complaints' => [
                'Primary Complaint' => ['sub' => ['loose stools / Diarrhea'], 'alias' => 'Complaints'],
                'Start Date' => ['sub' => ['date']],
                'End Date' => ['sub' => ['date', 'ongoing']],
                'Frequency' => ['sub' => ['1', '2', '3', '4', '5-10', '10-15', '15-20', '>20'], 'alias' => 'Frequency'],
                'Associated Complaints' => ['sub' => ['nausea', 'vomiting', 'abdominal pain', 'fever', 'alternate with constipation', 'incomplete evacuation', 'urge to pass stool', 'mouth ulcer', 'joint pain', 'rash', 'Other'], 'has_multiple' => true, 'alias' => 'Associated'],
                'Amount of Stool' => ['sub' => ['small', 'normal', 'large'], 'alias' => 'Amount'],
                'Consistency' => ['sub' => ['watery', 'pasty'], 'alias' => 'Consistency'],
                'Contents' => ['sub' => ['blood', 'mucous', 'fat', 'difficult to flush'], 'alias' => 'Contents', 'has_multiple' => true],
                'Blood from any other site' => ['sub' => ['Yes', 'No'], 'alias' => ''],
                'Lump in back passage' => ['sub' => ['Yes', 'No']],
            ],
            'past history' => [
                'Past similar episode(s) of diarrhea' => ['sub' => ['Yes' => ['within 1 month', 'within 3 months', 'within 6 months', 'within 12 months', 'more than 12 months'], 'No'], 'alias' => 'Frequency'],
                'How was the last episode' => ['sub' => ['serious', 'non-serious'], 'alias' => 'Severity'],
                'Previous Hopitalization due to diarrhea' => ['sub' => ['Yes', 'No']],
            ],
            'vaccination history' => [
                'Vaccination history' => ['sub' => ['All completed', 'Rotavirus vaccine', 'measles vaccine'], 'alias' => 'Vaccination', 'has_multiple' => true],
            ],
            'lifestyle' => [
                'Drinking water (home)' => ['sub' => ['Boiled', 'Unboiled',  'tap water', 'bottled water', 'RO water', 'other'], 'alias' => 'water'],
                'Type of toilet' => ['sub' => ['western', 'eastern', 'forest', 'river/stream', 'digging hole'], 'alias' => 'toilet'],
                'Suspected Food' => ['sub' => ['homemade', 'junkfood', 'street food']],
                'Regular soap use' => ['sub' => ['Yes', 'No'], 'alias' => 'soap use'],
                'Animals at home' => ['sub' => ['Yes', 'No'], 'alias' => 'animals interaction'],
            ],
            'systemic review' => [
                'Systemic review' => ['sub' => ['not significant', 'significant']],
            ],
            'treatment history' => [
                'Medications currently in use' => ['sub' => ['None', 'ORS', 'probiotic', 'zinc', 'Antibiotic'], 'alias' => 'medications', 'has_multiple' => true],
                'Compliance to medicine' => ['sub' => ['As per doctors advice', 'Stopped medicine him/herself'], 'alias' => 'compliance'],
                'Blood transfusion' => ['sub' => ['Yes', 'No'], 'alias' => 'transfusion'],
            ],
            'travel history' => [
                'Travel history' => ['sub' => ['local', 'international', 'none']],
            ],
            'family history' => [
                'Family History' => ['sub' => ['no history', 'similar complaint in family']],
            ],
            'diarrhea related examination' => [
                'General' => ['sub' => ['Alert', 'Lethargic/Unconcious', 'restless/irritable', 'sunken eyes'], 'alias' => 'general', 'has_multiple' => true],
                'Systemic infection signs' => ['sub' => ['Febrile', 'afebrile', 'other'], 'alias' => 'infection'],
                'Abdominal / Perianal examination' => ['sub' => ['pain on palpation', 'distention', 'other'], 'alias' => 'examination'],
                'Able to drink' => ['sub' => ['Eagerly', 'poorly or unable', 'normally'], 'alias' => 'able to drink'],
                'Skin turgor' => ['sub' => ['Very slowly', 'slowly', 'immediately'], 'alias' => 'turgor'],
                'Dehydration' => ['sub' => ['No dehydration', 'some dehydration', 'severe dehydration'], 'alias' => 'dehydration'],
            ],
            'laboratory history' => [
                'Laboratory history' => ['sub' => ['UCE', 'Stool DR' => ['Mucous', 'Red cells', 'occult blood', 'Bacteria', 'Ova', 'parasite'], 'Stool CS' => ['Ecoli', 'other organism']], 'has_multiple' => true],
            ],
            'final diagnosis' => [
                'Final diagnosis' => ['sub' => ['Acute', 'Persistent', 'Chronic', 'Mild', 'moderate', 'severe', 'Inflammatory diarrhea', 'infectious diarrhea', 'bacterial', 'viral', 'parasitic', 'Non inflammatory diarrhea', 'Osmotic diarrhea', 'Antibiotic associated diarrhea', 'secretory diarrhea', 'Other diarrhea'], 'has_multiple' => true],
            ],
            'confirmation of diagnosis' => [
                'Confirmation of diagnosis' => ['sub' => ['clinically confirmed', 'laboratory confirmed', 'epidemiologically confirmed'], 'has_multiple' => true],
            ],
            'differential diagnosis' => [
                'Differential diagnosis' => ['sub' => ['Yes', 'No']],
            ],
            'prescription and lab advice' => [
                'Prescription and Lab advice' => ['sub' => ['Medicine' => ['name', 'strength', 'dose', 'duration', 'other', 'is_seperate' => true, 'is_seperate_all' => true], 'labs' => ['CBC', 'UCE', 'LFT', 'PT', 'APTT', 'INR', 'Stook DR', 'Stool CS', 'Malaria', 'Dengue', 'Covid-19', 'other', 'is_seperate' => true, 'has_multiple' => true]]]
            ],
            'follow-up advice' => [
                'follow up' => ['sub' => ['after 1 week', 'after 2 weeks', 'after 1 month', 'Other' => 'date']],
            ],
            'lifestyle advice' => [
                'lifestyle advice' => ['sub' => ['Self medication', 'malnutrition', 'compliance to medicine', 'diarrhea', 'food poisoning', 'handwashing',], 'has_multiple' => true],
            ],

        ];

        foreach ($groups as $group => $questions) {
            // dd($question, $group);
            $group = Str::kebab($group);
            foreach ($questions as $question => $options) {
                // dd($question, $option);
                $q = Question::create([
                    'question' => ucfirst($question),
                    'parent_id' => 0,
                    'group' => $group,
                    'alias' => ucfirst($options['alias'] ?? ''),
                    'has_multiple' => array_key_exists('has_multiple', $options) && $options['has_multiple'] === true ? true : false
                ]);
                foreach ($options['sub'] as $key => $option) {
                    if (gettype($option) == 'array') {
                        $o = Question::create([
                            'question' => ucfirst($key),
                            'group' => $group,
                            'parent_id' => $q->id,
                            'is_seperate' => $key == 'other' || $key == 'Other' ? true : array_key_exists('is_seperate', $options['sub'][$key]),
                            'has_multiple' => array_key_exists('has_multiple', $options['sub'][$key])
                        ]);
                        foreach ($option as $k => $subOptions) {
                            if ($k != 'is_seperate' && $k != 'is_seperate_all' && $k != 'has_multiple') {
                                // dump($key, $subOptions);
                                // foreach ($subOptions as $option => $subOption) {
                                //     dd($subOption);
                                // Question::create([
                                //     'question' => $option,
                                //     'group' => $group,
                                //     'parent_id' => $q->id
                                // ]);
                                Question::create([
                                    'question' => ucfirst($subOptions),
                                    'group' => $group,
                                    'parent_id' => $o->id,
                                    'is_seperate' => $subOptions == 'other' || $subOptions == 'Other' ? true : array_key_exists('is_seperate_all', $options['sub'][$key])
                                ]);
                                // }
                            }
                        }
                    } else {
                        Question::create([
                            'question' => ucfirst($option),
                            'parent_id' => $q->id,
                            'group' => $group,
                            'is_seperate' => explode(' ', $option)[0] == 'other' || explode(' ', $option)[0] == 'Other' ? true : false,
                        ]);
                    }
                }
            }
        }
    }
}
