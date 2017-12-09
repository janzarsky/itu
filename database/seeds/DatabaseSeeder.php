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
        $this->add_animal('Kůň domácí', 'XXX je domestikované zvíře patřící mezi lichokopytníky. V minulosti se XXX používali především k přepravě. Od 20. století se na nich jezdí hlavně rekreačně.');

        $this->add_animal('Kočka domácí', 'XXX je domestikovaná forma XXX divoké, která je již po tisíciletí průvodcem člověka. Stejně jako její divoká příbuzná patří do podčeledi malé XXX, a je typickým zástupcem skupiny. Má pružné a svalnaté tělo, dokonale přizpůsobené lovu, ostré drápy a zuby a vynikající zrak, sluch a čich.');

        $this->add_animal('Králík domácí', 'XXX je domestikovaná forma evropského XXX divokého. XXX jsou domácím zvířetem, které lze poměrně snadno chovat v malochovech pro maso, bílé XXX maso obsahuje v porovnání s ostatními domácími zvířaty nejméně cholesterolu. Zakrslá plemena jsou pak oblíbeným zvířetem chovaným jako společníci, hlavně v městských bytech. Je oblíben převážně u malých dětí.');

        // Questions
        $this->add_question('choose_name_from_description', [1, 2, 3]);
        $this->add_question('choose_description_from_name', [3, 2, 1]);
        $this->add_question('choose_name_from_description', [2, 3, 1]);

        // Tests
        $this->add_test('Domácí zvířata', 1, [1, 2, 3]);

        // Results
        $r = new Result;
        $r->user_id = 2;
        $r->test_id = 1;
        $r->correct = 1;
        $r->save();
    }

    function add_animal($name, $description) {
        $a = new Animal;
        $a->name = $name;
        $a->description = $description;
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
