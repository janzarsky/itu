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
        $a1 = new Animal;
        $a1->name = 'Kůň domácí';
        $a1->description = 'XXX je domestikované zvíře patřící mezi lichokopytníky. V minulosti se XXX používali především k přepravě. Od 20. století se na nich jezdí hlavně rekreačně.';
        $a1->save();

        $a2 = new Animal;
        $a2->name = 'Kočka domácí';
        $a2->description = 'XXX je domestikovaná forma XXX divoké, která je již po tisíciletí průvodcem člověka. Stejně jako její divoká příbuzná patří do podčeledi malé XXX, a je typickým zástupcem skupiny. Má pružné a svalnaté tělo, dokonale přizpůsobené lovu, ostré drápy a zuby a vynikající zrak, sluch a čich.';
        $a2->save();

        $a3 = new Animal;
        $a3->name = 'Králík domácí';
        $a3->description = 'XXX je domestikovaná forma evropského XXX divokého. XXX jsou domácím zvířetem, které lze poměrně snadno chovat v malochovech pro maso, bílé XXX maso obsahuje v porovnání s ostatními domácími zvířaty nejméně cholesterolu. Zakrslá plemena jsou pak oblíbeným zvířetem chovaným jako společníci, hlavně v městských bytech. Je oblíben převážně u malých dětí.';
        $a3->save();

        // Questions
        $q = new Question;
        $q->type = 'choose_name_from_description';
        $q->save();

        $qa = new QuestionAnimal;
        $qa->question_id = 1;
        $qa->animal_id = 1;
        $qa->position = 1;
        $qa->save();

        $qa = new QuestionAnimal;
        $qa->question_id = 1;
        $qa->animal_id = 2;
        $qa->position = 2;
        $qa->save();

        $qa = new QuestionAnimal;
        $qa->question_id = 1;
        $qa->animal_id = 3;
        $qa->position = 3;
        $qa->save();

        $q = new Question;
        $q->type = 'choose_description_from_name';
        $q->save();

        $qa = new QuestionAnimal;
        $qa->question_id = 2;
        $qa->animal_id = 3;
        $qa->position = 1;
        $qa->save();

        $qa = new QuestionAnimal;
        $qa->question_id = 2;
        $qa->animal_id = 2;
        $qa->position = 2;
        $qa->save();

        $qa = new QuestionAnimal;
        $qa->question_id = 2;
        $qa->animal_id = 1;
        $qa->position = 3;
        $qa->save();

        // Tests
        $t = new Test;
        $t->name = 'Domácí zvířata';
        $t->difficulty = 1;
        $t->save();

        $tq = new TestQuestion;
        $tq->test_id = 1;
        $tq->question_id = 1;
        $tq->position = 1;
        $tq->save();

        $tq = new TestQuestion;
        $tq->test_id = 1;
        $tq->question_id = 2;
        $tq->position = 2;
        $tq->save();

        // Results
        $r = new Result;
        $r->user_id = 2;
        $r->test_id = 1;
        $r->correct = 1;
        $r->save();
    }
}
