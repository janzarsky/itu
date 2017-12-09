<?php

use App\User;
use App\Animal;
use App\Question;
use App\QuestionAnimal;
use App\Test;
use App\TestQuestion;
use App\Result;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Users
        $user1 = new User;
        $user1->name = 'Batman the admin';
        $user1->email = 'batman@asdf.cz';
        $user1->password = Hash::make('asdf');
        $user1->is_admin = true;
        $user1->save();

        $user2 = new User;
        $user2->name = 'Pepa the user';
        $user2->email = 'pepa@asdf.cz';
        $user2->password = Hash::make('asdf');
        $user2->save();

        // Animals
        $this->add_animal('Kůň domácí', 'Domestikované zvíře patřící mezi lichokopytníky. V minulosti se používali především k přepravě.', 'https://upload.wikimedia.org/wikipedia/commons/d/de/Nokota_Horses_cropped.jpg');

        $this->add_animal('Kočka domácí', 'Je již po tisíciletí průvodcem člověka. Má pružné a svalnaté tělo, dokonale přizpůsobené lovu, ostré drápy a zuby a vynikající zrak, sluch a čich.', 'https://upload.wikimedia.org/wikipedia/commons/thumb/5/58/Collage_of_Six_Cats-01.jpg/604px-Collage_of_Six_Cats-01.jpg');

        $this->add_animal('Králík domácí', 'Domácí zvíře, které lze poměrně snadno chovat v malochovech pro maso, jeho maso obsahuje v porovnání s ostatními domácími zvířaty nejméně cholesterolu. Zakrslá plemena jsou pak oblíbeným zvířetem chovaným jako společníci, hlavně v městských bytech.', 'https://upload.wikimedia.org/wikipedia/commons/thumb/f/f1/Kaninchen3.jpg/640px-Kaninchen3.jpg');

        $this->add_animal('Pes domácí', 'Největší domestikovaná šelma a jedno z nejstarších domestikovaných zvířat vůbec, provázející člověka minimálně 14 tisíc let. Obecně se předpokládá, že se jedná o zdomácnělého a umělým výběrem změněného vlka obecného.', 'https://upload.wikimedia.org/wikipedia/commons/2/28/Golden-retriever-1.jpg');

        $this->add_animal('Prase domácí', 'Je to významné domácí zvíře, chované hospodářsky především pro maso.', 'https://upload.wikimedia.org/wikipedia/commons/thumb/b/b0/Sus_scrofa_scrofa.jpg/640px-Sus_scrofa_scrofa.jpg');

        $this->add_animal('Ovce domácí', 'Malým domestikovaný přežvýkavec, chovaným hlavně pro vlnu a mléko, zčásti také pro maso. Protože nejsou tak náročné jako skot, chovají se i v horských nebo aridních oblastech.', 'https://upload.wikimedia.org/wikipedia/commons/thumb/3/3a/Ovce-tabor.jpg/640px-Ovce-tabor.jpg');

        // Questions
        $this->add_question('choose_name_from_description', [1, 2, 3]);
        $this->add_question('choose_description_from_name', [3, 2, 4]);
        $this->add_question('choose_name_from_description', [2, 6, 1]);
        $this->add_question('choose_description_from_name', [5, 1, 6]);

        $this->add_question('choose_name_from_description', [2, 3, 4]);
        $this->add_question('choose_name_from_description', [3, 2, 4]);
        $this->add_question('choose_description_from_name', [4, 3, 2]);

        // Tests
        $this->add_test('Domácí zvířata', 1, [1, 2, 3, 4]);
        $this->add_test('Malá zvířata', 1, [5, 6, 7]);

        // Results
        $r = new Result;
        $r->user_id = 2;
        $r->test_id = 1;
        $r->correct = 1;
        $r->save();
    }

    function add_animal($name, $description, $image_url) {
        $a = new Animal;
        $a->name = $name;
        $a->description = $description;
        $a->image_url = $image_url;
        $a->save();
    }
    
    function add_question($type, $animals) {
        $q = new Question;
        $q->type = $type;
        $q->save();

        $cnt = 1;

        foreach ($animals as $a) {
            $qa = new QuestionAnimal;
            $qa->question_id = $q->id;
            $qa->animal_id = $a;
            $qa->position = $cnt;
            $qa->save();

            $cnt++;
        }
    }

    function add_test($name, $difficulty, $questions) {
        $t = new Test;
        $t->name = $name;
        $t->difficulty = $difficulty;
        $t->save();

        $cnt = 1;

        foreach ($questions as $q) {
            $tq = new TestQuestion;
            $tq->test_id = $t->id;
            $tq->question_id = $q;
            $tq->position = $cnt;
            $tq->save();

            $cnt++;
        }
    }
}
