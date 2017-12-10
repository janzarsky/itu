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
        $user = new User;
        $user->name = 'Pepa';
        $user->email = 'pepa@asdf.cz';
        $user->password = Hash::make('asdf');
        $user->save();

        // Animals
        $this->add_animal('Kůň domácí', 'Domestikované zvíře patřící mezi lichokopytníky. V minulosti se používali především k přepravě.', 'https://upload.wikimedia.org/wikipedia/commons/d/de/Nokota_Horses_cropped.jpg');
        $this->add_animal('Kočka domácí', 'Je již po tisíciletí průvodcem člověka. Má pružné a svalnaté tělo, dokonale přizpůsobené lovu, ostré drápy a zuby a vynikající zrak, sluch a čich.', 'https://upload.wikimedia.org/wikipedia/commons/thumb/5/58/Collage_of_Six_Cats-01.jpg/604px-Collage_of_Six_Cats-01.jpg');
        $this->add_animal('Králík domácí', 'Domácí zvíře, které lze poměrně snadno chovat v malochovech pro maso. Zakrslá plemena jsou pak oblíbeným zvířetem chovaným jako společníci, hlavně v městských bytech.', 'https://upload.wikimedia.org/wikipedia/commons/thumb/f/f1/Kaninchen3.jpg/640px-Kaninchen3.jpg');
        $this->add_animal('Pes domácí', 'Největší domestikovaná šelma a jedno z nejstarších domestikovaných zvířat vůbec, provázející člověka minimálně 14 tisíc let. Obecně se předpokládá, že se jedná o zdomácnělého a umělým výběrem změněného vlka obecného.', 'https://upload.wikimedia.org/wikipedia/commons/2/28/Golden-retriever-1.jpg');
        $this->add_animal('Prase domácí', 'Je to významné domácí zvíře, chované hospodářsky především pro maso.', 'https://upload.wikimedia.org/wikipedia/commons/thumb/b/b0/Sus_scrofa_scrofa.jpg/640px-Sus_scrofa_scrofa.jpg');
        $this->add_animal('Ovce domácí', 'Malým domestikovaný přežvýkavec, chovaným hlavně pro vlnu a mléko, zčásti také pro maso. Protože nejsou tak náročné jako skot, chovají se i v horských nebo aridních oblastech.', 'https://upload.wikimedia.org/wikipedia/commons/thumb/3/3a/Ovce-tabor.jpg/640px-Ovce-tabor.jpg');
        $this->add_animal('Norek americký', 'Bacon ipsum dolor amet short ribs t-bone sausage prosciutto, meatloaf turducken leberkas alcatra kielbasa tongue pork loin shank pork jowl sirloin.', 'https://upload.wikimedia.org/wikipedia/commons/0/04/MinkforWiki.jpg');
        $this->add_animal('Tchoř tmavý', 'Short loin turkey flank, tenderloin tongue shank bresaola beef ribs meatball chuck.', 'https://upload.wikimedia.org/wikipedia/commons/2/2e/Mustela_putorius_01-cropped.jpg');
        $this->add_animal('Tchoř stepní', 'Short loin turkey flank, tenderloin tongue shank bresaola beef ribs meatball chuck.', 'https://upload.wikimedia.org/wikipedia/commons/2/2c/Mustela_eversmannii_2.jpg');
        $this->add_animal('Kuna lesní', 'Bacon ipsum dolor amet short ribs t-bone sausage prosciutto, meatloaf turducken leberkas alcatra kielbasa tongue pork loin shank pork jowl sirloin.', 'https://upload.wikimedia.org/wikipedia/commons/f/ff/Martes_martes_crop.jpg');
        $this->add_animal('Kuna skalní', 'Prosciutto ground round pastrami doner burgdoggen. Pork short loin prosciutto tongue hamburger, jerky t-bone turducken chuck andouille pork belly boudin.', 'https://media.novinky.cz/269/212699-gallery1-px7zk.jpg');
        $this->add_animal('Lasice kolčava', 'Prosciutto ground round pastrami doner burgdoggen. Pork short loin prosciutto tongue hamburger, jerky t-bone turducken chuck andouille pork belly boudin.', 'https://upload.wikimedia.org/wikipedia/commons/e/e3/Mustela_nivalis_-British_Wildlife_Centre-4.jpg');
        $this->add_animal('Lasice hranostaj', 'Short loin turkey flank, tenderloin tongue shank bresaola beef ribs meatball chuck.', 'https://upload.wikimedia.org/wikipedia/commons/7/77/Mustela_Erminea_head.jpg');
        $this->add_animal('Jezevec lesní', 'Bacon ipsum dolor amet short ribs t-bone sausage prosciutto, meatloaf turducken leberkas alcatra kielbasa tongue pork loin shank pork jowl sirloin.', 'https://upload.wikimedia.org/wikipedia/commons/9/9e/%27Honey%27_the_badger.jpg');
        $this->add_animal('Vydra říční', 'Prosciutto ground round pastrami doner burgdoggen. Pork short loin prosciutto tongue hamburger, jerky t-bone turducken chuck andouille pork belly boudin.', 'https://upload.wikimedia.org/wikipedia/commons/8/89/Loutre2.jpg');
        $this->add_animal('Medvěd hnědý', 'Bacon ipsum dolor amet short ribs t-bone sausage prosciutto, meatloaf turducken leberkas alcatra kielbasa tongue pork loin shank pork jowl sirloin.', 'https://upload.wikimedia.org/wikipedia/commons/5/59/2_bears_and_salmon.JPG');
        $this->add_animal('Mýval severní', 'Short loin turkey flank, tenderloin tongue shank bresaola beef ribs meatball chuck.', 'https://upload.wikimedia.org/wikipedia/commons/6/66/%2A_Raccoon.jpg');
        $this->add_animal('Psík mývalovitý', 'Prosciutto ground round pastrami doner burgdoggen. Pork short loin prosciutto tongue hamburger, jerky t-bone turducken chuck andouille pork belly boudin.', 'https://upload.wikimedia.org/wikipedia/commons/9/92/Nyctereutes_procyonoides_16072008.jpg');
        $this->add_animal('Liška obecná', 'Prosciutto ground round pastrami doner burgdoggen. Pork short loin prosciutto tongue hamburger, jerky t-bone turducken chuck andouille pork belly boudin.', 'https://upload.wikimedia.org/wikipedia/commons/0/01/Adult_fox.JPG');
        $this->add_animal('Vlk obecný', 'Short loin turkey flank, tenderloin tongue shank bresaola beef ribs meatball chuck.', 'https://upload.wikimedia.org/wikipedia/commons/4/47/Canis_lupus_1_%28Martin_Mecnarowski%29.jpg');
        $this->add_animal('Rys ostrovid', 'Bacon ipsum dolor amet short ribs t-bone sausage prosciutto, meatloaf turducken leberkas alcatra kielbasa tongue pork loin shank pork jowl sirloin.', 'https://upload.wikimedia.org/wikipedia/commons/3/36/Lodjur_fotograferad_pa_Polar_Zoo_Norge.jpg');
        $this->add_animal('Kočka divoká', 'Bacon ipsum dolor amet short ribs t-bone sausage prosciutto, meatloaf turducken leberkas alcatra kielbasa tongue pork loin shank pork jowl sirloin.', 'http://www.priroda.cz/clanky/foto/bohdal_kocka-divoka-66680.jpg');
        $this->add_animal('Prase divoké', 'Prosciutto ground round pastrami doner burgdoggen. Pork short loin prosciutto tongue hamburger, jerky t-bone turducken chuck andouille pork belly boudin.', 'https://upload.wikimedia.org/wikipedia/commons/c/c0/A_young_wild_boar_in_his_environment.jpg');
        $this->add_animal('Jelen lesní', 'Bacon ipsum dolor amet short ribs t-bone sausage prosciutto, meatloaf turducken leberkas alcatra kielbasa tongue pork loin shank pork jowl sirloin.', 'https://upload.wikimedia.org/wikipedia/commons/7/75/Cervus_elaphus_Luc_Viatour_3.jpg');
        $this->add_animal('Daněk evropský', 'Short loin turkey flank, tenderloin tongue shank bresaola beef ribs meatball chuck.', 'https://upload.wikimedia.org/wikipedia/commons/8/8c/Daino_maschio.JPG');
        $this->add_animal('Jelen sika', 'Short loin turkey flank, tenderloin tongue shank bresaola beef ribs meatball chuck.', 'https://upload.wikimedia.org/wikipedia/commons/f/f6/Cervus_nippon_002.jpg');
        $this->add_animal('Jelenec běloocasý', 'Prosciutto ground round pastrami doner burgdoggen. Pork short loin prosciutto tongue hamburger, jerky t-bone turducken chuck andouille pork belly boudin.', 'http://calphotos.berkeley.edu/imgs/512x768/0000_0000/0708/0115.jpeg');
        $this->add_animal('Srnec obecný', 'Bacon ipsum dolor amet short ribs t-bone sausage prosciutto, meatloaf turducken leberkas alcatra kielbasa tongue pork loin shank pork jowl sirloin.', 'https://upload.wikimedia.org/wikipedia/commons/5/5d/Capreolus_capreolus_%28Marek_Szczepanek%29.jpg');
        $this->add_animal('Los evropský', 'Prosciutto ground round pastrami doner burgdoggen. Pork short loin prosciutto tongue hamburger, jerky t-bone turducken chuck andouille pork belly boudin.', 'https://upload.wikimedia.org/wikipedia/commons/b/be/Moose_983_LAB.jpg');
        $this->add_animal('Kamzík horský', 'Bacon ipsum dolor amet short ribs t-bone sausage prosciutto, meatloaf turducken leberkas alcatra kielbasa tongue pork loin shank pork jowl sirloin.', 'https://upload.wikimedia.org/wikipedia/commons/e/eb/Gaemsen_nebelhorn_20081015.jpg');
        $this->add_animal('Muflon', 'Short loin turkey flank, tenderloin tongue shank bresaola beef ribs meatball chuck.', 'https://upload.wikimedia.org/wikipedia/commons/1/1c/Ovis_musimon_trebon_brewery.jpg');
        $this->add_animal('Paovce hřivnatá', 'Prosciutto ground round pastrami doner burgdoggen. Pork short loin prosciutto tongue hamburger, jerky t-bone turducken chuck andouille pork belly boudin.', 'http://www.theonlinezoo.com/img/09/toz09164s.jpg');
        $this->add_animal('Zajíc polní', 'Prosciutto ground round pastrami doner burgdoggen. Pork short loin prosciutto tongue hamburger, jerky t-bone turducken chuck andouille pork belly boudin.', 'https://upload.wikimedia.org/wikipedia/commons/e/ea/01-sfel-08-009a.jpg');
        $this->add_animal('Králík divoký', 'Bacon ipsum dolor amet short ribs t-bone sausage prosciutto, meatloaf turducken leberkas alcatra kielbasa tongue pork loin shank pork jowl sirloin.', 'https://upload.wikimedia.org/wikipedia/commons/f/fd/Katoenstaartkonijn_3.jpg');
        $this->add_animal('Veverka obecná', 'Short loin turkey flank, tenderloin tongue shank bresaola beef ribs meatball chuck.', 'https://upload.wikimedia.org/wikipedia/commons/0/0c/2013_-_Sciurus_vulgaris_-_01.jpg');
        $this->add_animal('Sysel obecný', 'Short loin turkey flank, tenderloin tongue shank bresaola beef ribs meatball chuck.', 'https://upload.wikimedia.org/wikipedia/commons/6/6e/Susel_moregowany2.jpg');
        $this->add_animal('Bobr evropský', 'Prosciutto ground round pastrami doner burgdoggen. Pork short loin prosciutto tongue hamburger, jerky t-bone turducken chuck andouille pork belly boudin.', 'https://upload.wikimedia.org/wikipedia/commons/c/cc/Beaver_pho34.jpg');
        $this->add_animal('Nutrie říční', 'Prosciutto ground round pastrami doner burgdoggen. Pork short loin prosciutto tongue hamburger, jerky t-bone turducken chuck andouille pork belly boudin.', 'http://www.chovzvirat.cz/images/zvirata/nutrie-ricni_ezs67ln.jpg');
        $this->add_animal('Křeček polní', 'Bacon ipsum dolor amet short ribs t-bone sausage prosciutto, meatloaf turducken leberkas alcatra kielbasa tongue pork loin shank pork jowl sirloin.', 'https://upload.wikimedia.org/wikipedia/commons/3/35/Cricetus_cricetus_01.jpg');
        $this->add_animal('Norník rudý', 'Short loin turkey flank, tenderloin tongue shank bresaola beef ribs meatball chuck.', 'https://upload.wikimedia.org/wikipedia/commons/d/d2/Skogssorken_%28Myodes_glareolus%29.JPG');
        $this->add_animal('Hryzec vodní', 'Prosciutto ground round pastrami doner burgdoggen. Pork short loin prosciutto tongue hamburger, jerky t-bone turducken chuck andouille pork belly boudin.', 'https://upload.wikimedia.org/wikipedia/commons/c/c2/Arvicola-terrestris.jpg');
        $this->add_animal('Ondatra pižmová', 'Bacon ipsum dolor amet short ribs t-bone sausage prosciutto, meatloaf turducken leberkas alcatra kielbasa tongue pork loin shank pork jowl sirloin.', 'https://upload.wikimedia.org/wikipedia/commons/0/00/Muskrat_swimming_Ottawa.jpg');
        $this->add_animal('Hraboš polní', 'Short loin turkey flank, tenderloin tongue shank bresaola beef ribs meatball chuck.', 'https://upload.wikimedia.org/wikipedia/commons/1/10/Feldmaus_Microtus_arvalis.jpg');
        $this->add_animal('Hraboš mokřadní', 'Prosciutto ground round pastrami doner burgdoggen. Pork short loin prosciutto tongue hamburger, jerky t-bone turducken chuck andouille pork belly boudin.', 'http://www.hlasek.com/foto/microtus_agrestis_bt3363.jpg');
        $this->add_animal('Hrabošík podzemní', 'Prosciutto ground round pastrami doner burgdoggen. Pork short loin prosciutto tongue hamburger, jerky t-bone turducken chuck andouille pork belly boudin.', 'http://www.biolib.cz/IMG/GAL/274586.jpg');
        $this->add_animal('Krysa obecná', 'Short loin turkey flank, tenderloin tongue shank bresaola beef ribs meatball chuck.', 'http://www.naturfoto.cz/fotografie/andera/krysa-obecna-3791.jpg');
        $this->add_animal('Potkan', 'Prosciutto ground round pastrami doner burgdoggen. Pork short loin prosciutto tongue hamburger, jerky t-bone turducken chuck andouille pork belly boudin.', 'https://upload.wikimedia.org/wikipedia/commons/1/10/Co-swand-09-12.jpg');
        $this->add_animal('Myš domácí', 'Bacon ipsum dolor amet short ribs t-bone sausage prosciutto, meatloaf turducken leberkas alcatra kielbasa tongue pork loin shank pork jowl sirloin.', 'https://upload.wikimedia.org/wikipedia/commons/a/ab/House_mouse.jpg');
        $this->add_animal('Myška drobná', 'Prosciutto ground round pastrami doner burgdoggen. Pork short loin prosciutto tongue hamburger, jerky t-bone turducken chuck andouille pork belly boudin.', 'https://upload.wikimedia.org/wikipedia/commons/a/a3/Harvest_mouse1.jpg');
        $this->add_animal('Myšice temnopásá', 'Short loin turkey flank, tenderloin tongue shank bresaola beef ribs meatball chuck.', 'https://upload.wikimedia.org/wikipedia/commons/0/01/Brandmaus.jpg');
        $this->add_animal('Myšivka horská', 'Bacon ipsum dolor amet short ribs t-bone sausage prosciutto, meatloaf turducken leberkas alcatra kielbasa tongue pork loin shank pork jowl sirloin.', 'https://upload.wikimedia.org/wikipedia/commons/8/8b/Sicista_betulina_02.JPG');
        $this->add_animal('Myšice lesní', 'Prosciutto ground round pastrami doner burgdoggen. Pork short loin prosciutto tongue hamburger, jerky t-bone turducken chuck andouille pork belly boudin.', 'https://upload.wikimedia.org/wikipedia/commons/4/41/Apodemus_flavicollis_%28Ratiborice%29.jpg');
        $this->add_animal('Myšice křovinná', 'Prosciutto ground round pastrami doner burgdoggen. Pork short loin prosciutto tongue hamburger, jerky t-bone turducken chuck andouille pork belly boudin.', 'https://upload.wikimedia.org/wikipedia/commons/b/bd/Apodemus_sylvaticus_bosmuis.jpg');
        $this->add_animal('Myšice malooká', 'Prosciutto ground round pastrami doner burgdoggen. Pork short loin prosciutto tongue hamburger, jerky t-bone turducken chuck andouille pork belly boudin.', 'https://upload.wikimedia.org/wikipedia/commons/6/62/Apodemus_uralensis_3.jpg');
        $this->add_animal('Plch velký', 'Bacon ipsum dolor amet short ribs t-bone sausage prosciutto, meatloaf turducken leberkas alcatra kielbasa tongue pork loin shank pork jowl sirloin.', 'https://upload.wikimedia.org/wikipedia/commons/0/0b/Siebenschlaefer_glis_glis.jpg');
        $this->add_animal('Plšík liskový', 'Short loin turkey flank, tenderloin tongue shank bresaola beef ribs meatball chuck.', 'https://upload.wikimedia.org/wikipedia/commons/1/13/Haselmaus.JPG');
        $this->add_animal('Plch zahradní', 'Bacon ipsum dolor amet short ribs t-bone sausage prosciutto, meatloaf turducken leberkas alcatra kielbasa tongue pork loin shank pork jowl sirloin.', 'https://upload.wikimedia.org/wikipedia/commons/1/12/Eliomys_quercinus01.jpg');
        $this->add_animal('Plch lesní', 'Bacon ipsum dolor amet short ribs t-bone sausage prosciutto, meatloaf turducken leberkas alcatra kielbasa tongue pork loin shank pork jowl sirloin.', 'https://upload.wikimedia.org/wikipedia/commons/4/45/Dryomys_nitedula.jpg');
        $this->add_animal('Ježek východní', 'Prosciutto ground round pastrami doner burgdoggen. Pork short loin prosciutto tongue hamburger, jerky t-bone turducken chuck andouille pork belly boudin.', 'https://upload.wikimedia.org/wikipedia/commons/5/59/2008_Hedgehog_1020932.jpg');
        $this->add_animal('Ježek západní', 'Short loin turkey flank, tenderloin tongue shank bresaola beef ribs meatball chuck.', 'https://upload.wikimedia.org/wikipedia/commons/c/cb/Erinaceus_europaeus_%28Linnaeus%2C_1758%29.jpg');
        $this->add_animal('Rejsec černý', 'Prosciutto ground round pastrami doner burgdoggen. Pork short loin prosciutto tongue hamburger, jerky t-bone turducken chuck andouille pork belly boudin.', 'https://upload.wikimedia.org/wikipedia/commons/3/32/Neomys_anomalus_01_by-dpc.jpg');
        $this->add_animal('Rejsec vodní', 'Prosciutto ground round pastrami doner burgdoggen. Pork short loin prosciutto tongue hamburger, jerky t-bone turducken chuck andouille pork belly boudin.', 'https://upload.wikimedia.org/wikipedia/commons/9/98/Neomys_fodiens_TF_090829.jpg');
        $this->add_animal('Rejsek obecný', 'Bacon ipsum dolor amet short ribs t-bone sausage prosciutto, meatloaf turducken leberkas alcatra kielbasa tongue pork loin shank pork jowl sirloin.', 'https://upload.wikimedia.org/wikipedia/commons/c/cf/SorexAraneus_wwalas_02.JPG');
        $this->add_animal('Rejsek malý', 'Short loin turkey flank, tenderloin tongue shank bresaola beef ribs meatball chuck.', 'https://upload.wikimedia.org/wikipedia/commons/a/ae/Sorex_minutus.jpg');
        $this->add_animal('Bělozubka bělobřichá', 'Prosciutto ground round pastrami doner burgdoggen. Pork short loin prosciutto tongue hamburger, jerky t-bone turducken chuck andouille pork belly boudin.', 'https://upload.wikimedia.org/wikipedia/commons/1/10/Crocidura_leucodon-1.jpg');
        $this->add_animal('Bělozubka šedá', 'Short loin turkey flank, tenderloin tongue shank bresaola beef ribs meatball chuck.', 'https://upload.wikimedia.org/wikipedia/commons/9/95/Gartenspitzmaus.jpg');
        $this->add_animal('Krtek obecný', 'Prosciutto ground round pastrami doner burgdoggen. Pork short loin prosciutto tongue hamburger, jerky t-bone turducken chuck andouille pork belly boudin.', 'https://upload.wikimedia.org/wikipedia/commons/8/80/Close-up_of_mole.jpg');
        $this->add_animal('člověk moudrý', 'Bacon ipsum dolor amet short ribs t-bone sausage prosciutto, meatloaf turducken leberkas alcatra kielbasa tongue pork loin shank pork jowl sirloin.', 'https://cdn.i0.cz/public-data/a3/aa/ce27bcb83560b0d37ee8f1be777e_r16:9_w630_h354_gi:photo:547747.jpg');
        $this->add_animal('Ksukol ocasatý', 'Prosciutto ground round pastrami doner burgdoggen. Pork short loin prosciutto tongue hamburger, jerky t-bone turducken chuck andouille pork belly boudin.', 'https://upload.wikimedia.org/wikipedia/commons/9/9a/Aye-aye_%28Daubentonia_madagascariensis%29_4.jpg');
        $this->add_animal('Outloň váhavý', 'Short loin turkey flank, tenderloin tongue shank bresaola beef ribs meatball chuck.', 'https://upload.wikimedia.org/wikipedia/commons/thumb/3/34/Nycticebus_coucang_001.jpg/800px-Nycticebus_coucang_001.jpg');
        $this->add_animal('Komba ušatá', 'Prosciutto ground round pastrami doner burgdoggen. Pork short loin prosciutto tongue hamburger, jerky t-bone turducken chuck andouille pork belly boudin.', 'https://s-media-cache-ak0.pinimg.com/736x/7b/b2/8f/7bb28f01b431e9c49b2e4f0ce8454b47.jpg');
        $this->add_animal('Vřešťan', 'Prosciutto ground round pastrami doner burgdoggen. Pork short loin prosciutto tongue hamburger, jerky t-bone turducken chuck andouille pork belly boudin.', 'https://upload.wikimedia.org/wikipedia/commons/thumb/2/27/Alouatta_sara_%28Bolivian_red_howler%29.jpg/800px-Alouatta_sara_%28Bolivian_red_howler%29.jpg');
        $this->add_animal('Malpa kapucínská', 'Bacon ipsum dolor amet short ribs t-bone sausage prosciutto, meatloaf turducken leberkas alcatra kielbasa tongue pork loin shank pork jowl sirloin.', 'https://upload.wikimedia.org/wikipedia/commons/1/15/Cebus_capucinus%2C_Costa_Rica.JPG');
        $this->add_animal('Kočkodan obecný', 'Short loin turkey flank, tenderloin tongue shank bresaola beef ribs meatball chuck.', 'https://upload.wikimedia.org/wikipedia/commons/thumb/5/56/AwasaVervet.jpg/1024px-AwasaVervet.jpg');
        $this->add_animal('Orangutan', 'Prosciutto ground round pastrami doner burgdoggen. Pork short loin prosciutto tongue hamburger, jerky t-bone turducken chuck andouille pork belly boudin.', 'http://yourshot.nationalgeographic.com/u/ss/fQYSUbVfts-T7pS2VP2wnKyN8wxywmXtY0-FwsgxpCviovjTwzZ9AzzNVR5f8LWgB4bIGx-d-cZy3qGrGWwK/');
        $this->add_animal('Gorila', 'Prosciutto ground round pastrami doner burgdoggen. Pork short loin prosciutto tongue hamburger, jerky t-bone turducken chuck andouille pork belly boudin.', 'https://upload.wikimedia.org/wikipedia/commons/thumb/2/21/Female_gorilla_with_8_months_old_baby_boy_gorilla_in_SF_zoo.jpg/800px-Female_gorilla_with_8_months_old_baby_boy_gorilla_in_SF_zoo.jpg');

        // Questions
        $this->add_question('name', 'description', [1, 2, 3]);
        $this->add_question('description', 'name', [3, 1, 4]);
        $this->add_question('image', 'name', [5, 1, 2]);
        $this->add_question('name', 'image', [2, 6, 1]);
        $this->add_question('description', 'image', [3, 2, 4]);
        $this->add_question('image', 'description', [3, 4, 6]);

        $this->add_question('name', 'description', [2, 3, 4]);
        $this->add_question('name', 'description', [3, 2, 4]);
        $this->add_question('description', 'name', [4, 3, 2]);
        
        $this->add_question('name', 'image', [1, 2, 3]);
        $this->add_question('name', 'image', [4, 5, 6]);
        $this->add_question('name', 'image', [7, 8, 9]);
        $this->add_question('name', 'image', [10, 11, 12]);
        $this->add_question('name', 'image', [15, 16, 17]);
        $this->add_question('name', 'image', [18, 19, 20]);
        $this->add_question('name', 'image', [21, 22, 23]);
        $this->add_question('name', 'image', [24, 25, 26]);
        $this->add_question('name', 'image', [27, 28, 29]);
        $this->add_question('name', 'image', [30, 31, 32]);
        $this->add_question('name', 'image', [33, 34, 35]);
        $this->add_question('name', 'image', [36, 37, 38]);
        $this->add_question('name', 'image', [39, 40, 41]);
        $this->add_question('name', 'image', [42, 43, 44]);
        $this->add_question('name', 'image', [45, 46, 47]);
        $this->add_question('name', 'image', [48, 49, 50]);
        $this->add_question('name', 'image', [51, 52, 53]);
        $this->add_question('name', 'image', [54, 55, 56]);
        $this->add_question('name', 'image', [57, 58, 59]);
        $this->add_question('name', 'image', [60, 61, 62]);
        $this->add_question('name', 'image', [63, 64, 65]);
        $this->add_question('name', 'image', [66, 67, 68]);
        $this->add_question('name', 'image', [69, 70, 71]);
        $this->add_question('name', 'image', [72, 73, 74]);
        $this->add_question('name', 'image', [75, 76, 1]);

        // Tests
        $this->add_test('Domácí zvířata', 1, [1, 2, 3, 4, 5, 6]);
        $this->add_test('Malá zvířata', 1, [7, 8, 9]);
        $this->add_test('Všechna zvířata', 1, [10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27]);

        // Results
        $this->add_result(1, 1, 1);
        $this->add_result(1, 1, 2);
        $this->add_result(1, 1, 1);
        $this->add_result(1, 1, 3);

        $this->add_result(1, 2, 3);
        $this->add_result(1, 2, 2);
    }

    function add_animal($name, $description, $image_url) {
        $a = new Animal;
        $a->name = $name;
        $a->description = $description;
        $a->image_url = $image_url;
        $a->save();
    }
    
    function add_question($question_type, $answer_type, $animals) {
        $q = new Question;
        $q->question_type = $question_type;
        $q->answer_type = $answer_type;
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

    function add_result($user_id, $test_id, $correct) {
        $r = new Result;
        $r->user_id = $user_id;
        $r->test_id = $test_id;
        $r->correct = $correct;
        $r->completed = true;
        $r->save();
    }
}
