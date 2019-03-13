-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2016 at 13:12 PM
-- Server version: 5.6.11
-- PHP Version: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
USE `iwa_2015_vz_projekt` ;


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Dumping data for table `tip_korisnika`
--

INSERT INTO `tip_korisnika` (`tip_id`, `naziv`) VALUES
(0, 'administrator'),
(1, 'voditelj'),
(2, 'korisnik');


--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`korisnik_id`, `tip_id`, `korisnicko_ime`, `lozinka`, `ime`, `prezime`, `email`, `slika`) VALUES
(1, 0, 'admin', 'foi', 'Administrator', '', '', 'korisnici/admin.jpg'),
(2, 1, 'voditelj', '123456', 'voditelj', '', '', 'korisnici/admin.jpg'),
(3, 2, 'pkos', '123456', 'Pero', 'Kos', 'pkos@fff.hr', 'korisnici/pkos.jpg'),
(4, 2, 'vzec', '123456', 'Vladimir', 'Zec', 'vzec@fff.hr', 'korisnici/vzec.jpg'),
(5, 2, 'qtarantino', '123456', 'Quentin', 'Tarantino', 'qtarantino@foi.hr', 'korisnici/qtarantino.jpg'),
(6, 2, 'mbellucci', '123456', 'Monica', 'Bellucci', 'mbellucci@foi.hr', 'korisnici/mbellucci.jpg'),
(7, 2, 'vmortensen', '123456', 'Viggo', 'Mortensen', 'vmortensen@foi.hr', 'korisnici/vmortensen.jpg'),
(8, 2, 'jgarner', '123456', 'Jennifer', 'Garner', 'jgarner@foi.hr', 'korisnici/jgarner.jpg'),
(9, 2, 'nportman', '123456', 'Natalie', 'Portman', 'nportman@foi.hr', 'korisnici/nportman.jpg'),
(10, 2, 'dradcliffe', '123456', 'Daniel', 'Radcliffe', 'dradcliffe@foi.hr', 'korisnici/dradcliffe.jpg'),
(11, 2, 'hberry', '123456', 'Halle', 'Berry', 'hberry@foi.hr', 'korisnici/hberry.jpg'),
(12, 2, 'vdiesel', '123456', 'Vin', 'Diesel', 'vdiesel@foi.hr', 'korisnici/vdiesel.jpg'),
(13, 2, 'ecuthbert', '123456', 'Elisha', 'Cuthbert', 'ecuthbert@foi.hr', 'korisnici/ecuthbert.jpg'),
(14, 2, 'janiston', '123456', 'Jennifer', 'Aniston', 'janiston@foi.hr', 'korisnici/janiston.jpg'),
(15, 2, 'ctheron', '123456', 'Charlize', 'Theron', 'ctheron@foi.hr', 'korisnici/ctheron.jpg'),
(16, 2, 'nkidman', '123456', 'Nicole', 'Kidman', 'nkidman@foi.hr', 'korisnici/nkidman.jpg'),
(17, 2, 'ewatson', '123456', 'Emma', 'Watson', 'ewatson@foi.hr', 'korisnici/ewatson.jpg'),
(18, 1, 'kdunst', '123456', 'Kirsten', 'Dunst', 'kdunst@foi.hr', 'korisnici/kdunst.jpg'),
(19, 2, 'sjohansson', '123456', 'Scarlett', 'Johansson', 'sjohansson@foi.hr', 'korisnici/sjohansson.jpg'),
(20, 2, 'philton', '123456', 'Paris', 'Hilton', 'philton@foi.hr', 'korisnici/philton.jpg'),
(21, 2, 'kbeckinsale', '123456', 'Kate', 'Beckinsale', 'kbeckinsale@foi.hr', 'korisnici/kbeckinsale.jpg'),
(22, 2, 'tcruise', '123456', 'Tom', 'Cruise', 'tcruise@foi.hr', 'korisnici/tcruise.jpg'),
(23, 2, 'hduff', '123456', 'Hilary', 'Duff', 'hduff@foi.hr', 'korisnici/hduff.jpg'),
(24, 2, 'ajolie', '123456', 'Angelina', 'Jolie', 'ajolie@foi.hr', 'korisnici/ajolie.jpg'),
(25, 2, 'kknightley', '123456', 'Keira', 'Knightley', 'kknightley@foi.hr', 'korisnici/kknightley.jpg'),
(26, 2, 'obloom', '123456', 'Orlando', 'Bloom', 'obloom@foi.hr', 'korisnici/obloom.jpg'),
(27, 2, 'llohan', '123456', 'Lindsay', 'Lohan', 'llohan@foi.hr', 'korisnici/llohan.jpg'),
(28, 2, 'jdepp', '123456', 'Johnny', 'Depp', 'jdepp@foi.hr', 'korisnici/jdepp.jpg'),
(29, 2, 'kreeves', '123456', 'Keanu', 'Reeves', 'kreeves@foi.hr', 'korisnici/kreeves.jpg'),
(30, 1, 'thanks', '123456', 'Tom', 'Hanks', 'thanks@foi.hr', 'korisnici/thanks.jpg'),
(31, 2, 'elongoria', '123456', 'Eva', 'Longoria', 'elongoria@foi.hr', 'korisnici/elongoria.jpg'),
(32, 2, 'rde', '123456', 'Robert', 'De', 'rde@foi.hr', 'korisnici/rde.jpg'),
(33, 2, 'jheder', '123456', 'Jon', 'Heder', 'jheder@foi.hr', 'korisnici/jheder.jpg'),
(34, 2, 'rmcadams', '123456', 'Rachel', 'McAdams', 'rmcadams@foi.hr', 'korisnici/rmcadams.jpg'),
(35, 2, 'cbale', '123456', 'Christian', 'Bale', 'cbale@foi.hr', 'korisnici/cbale.jpg'),
(36, 1, 'jalba', '123456', 'Jessica', 'Alba', 'jalba@foi.hr', 'korisnici/jalba.jpg'),
(37, 2, 'bpitt', '123456', 'Brad', 'Pitt', 'bpitt@foi.hr', 'korisnici/bpitt.jpg'),
(43, 2, 'apacino', '123456', 'Al', 'Pacino', 'apacino@foi.hr', 'korisnici/apacino.jpg'),
(44, 2, 'wsmith', '123456', 'Will', 'Smith', 'wsmith@foi.hr', 'korisnici/wsmith.jpg'),
(45, 2, 'ncage', '123456', 'Nicolas', 'Cage', 'ncage@foi.hr', 'korisnici/ncage.jpg'),
(46, 2, 'vanne', '123456', 'Vanessa', 'Anne', 'vanne@foi.hr', 'korisnici/vanne.jpg'),
(47, 2, 'kheigl', '123456', 'Katherine', 'Heigl', 'kheigl@foi.hr', 'korisnici/kheigl.jpg'),
(48, 2, 'gbutler', '123456', 'Gerard', 'Butler', 'gbutler@foi.hr', 'korisnici/gbutler.jpg'),
(49, 2, 'jbiel', '123456', 'Jessica', 'Biel', 'jbiel@foi.hr', 'korisnici/jbiel.jpg'),
(50, 2, 'ldicaprio', '123456', 'Leonardo', 'DiCaprio', 'ldicaprio@foi.hr', 'korisnici/ldicaprio.jpg'),
(51, 2, 'mdamon', '123456', 'Matt', 'Damon', 'mdamon@foi.hr', 'korisnici/mdamon.jpg'),
(52, 2, 'hpanettiere', '123456', 'Hayden', 'Panettiere', 'hpanettiere@foi.hr', 'korisnici/hpanettiere.jpg'),
(53, 2, 'rreynolds', '123456', 'Ryan', 'Reynolds', 'rreynolds@foi.hr', 'korisnici/rreynolds.jpg'),
(54, 2, 'jstatham', '123456', 'Jason', 'Statham', 'jstatham@foi.hr', 'korisnici/jstatham.jpg'),
(55, 2, 'enorton', '123456', 'Edward', 'Norton', 'enorton@foi.hr', 'korisnici/enorton.jpg'),
(56, 2, 'mwahlberg', '123456', 'Mark', 'Wahlberg', 'mwahlberg@foi.hr', 'korisnici/mwahlberg.jpg'),
(57, 2, 'jmcavoy', '123456', 'James', 'McAvoy', 'jmcavoy@foi.hr', 'korisnici/jmcavoy.jpg'),
(58, 2, 'epage', '123456', 'Ellen', 'Page', 'epage@foi.hr', 'korisnici/epage.jpg'),
(59, 2, 'mcyrus', '123456', 'Miley', 'Cyrus', 'mcyrus@foi.hr', 'korisnici/mcyrus.jpg'),
(60, 2, 'kstewart', '123456', 'Kristen', 'Stewart', 'kstewart@foi.hr', 'korisnici/kstewart.jpg'),
(61, 2, 'mfox', '123456', 'Megan', 'Fox', 'mfox@foi.hr', 'korisnici/mfox.jpg'),
(62, 2, 'slabeouf', '123456', 'Shia', 'LaBeouf', 'slabeouf@foi.hr', 'korisnici/slabeouf.jpg'),
(63, 2, 'ceastwood', '123456', 'Clint', 'Eastwood', 'ceastwood@foi.hr', 'korisnici/ceastwood.jpg'),
(64, 2, 'srogen', '123456', 'Seth', 'Rogen', 'srogen@foi.hr', 'korisnici/srogen.jpg'),
(65, 2, 'nreed', '123456', 'Nikki', 'Reed', 'nreed@foi.hr', 'korisnici/nreed.jpg'),
(66, 2, 'agreene', '123456', 'Ashley', 'Greene', 'agreene@foi.hr', 'korisnici/agreene.jpg'),
(67, 2, 'zdeschanel', '123456', 'Zooey', 'Deschanel', 'zdeschanel@foi.hr', 'korisnici/zdeschanel.jpg'),
(68, 2, 'dfanning', '123456', 'Dakota', 'Fanning', 'dfanning@foi.hr', 'korisnici/dfanning.jpg'),
(69, 2, 'tlautner', '123456', 'Taylor', 'Lautner', 'tlautner@foi.hr', 'korisnici/tlautner.jpg'),
(70, 2, 'rpattinson', '123456', 'Robert', 'Pattinson', 'rpattinson@foi.hr', 'korisnici/rpattinson.jpg');


INSERT INTO `udruga` (`udruga_id`, `moderator_id`, `naziv`, `opis`) VALUES
(1, 2, 'Planinarska udruga Varaždin', 'Planinarska udruga Varaždin je dobrovoljno, samostalno i izvanstranačko udruženje građana i planinara u Varaždinu, kao i bliže, te dalje okolice, koji svojim djelovanjem imaju namjeru unaprijediti i u što većoj mjeri razviti planinarstvo i rekreaciju u našem kraju, kao i radi postizanja osobnih i zajedničkih ciljeva u okviru planinarske djelatnosti.'),
(2, 2, 'Skijaška udruga Varaždin','Skijaška udruga Varaždin je sportska udruga osnovana 2010. godine sa sjedištem u Varaždinu. Misija udruge je aktivnostima doprinijeti popularizaciji skijaškog sporta na području Varaždinske županije i Republike Hrvatske te organiziranim radom omogućiti što većem broju djece, mladeži i odraslih pristupačnu skijašku obuku i rekreativno bavljenje skijaškim sportom. '),
(3, 2, 'Ronilačka udruga Varaždin', 'Ronilačka udruga Varaždin je neprofitna udruga građana okupljenih oko ronjenja i ronilačkih sportova. Udruga je osnovana 1997. godine u Varaždinu. Iako naizgled mlada, Udruga ipak ima nešto dužu tradiciju. Zbog svoje istinske predanosti ljubavi prema ronjenju i druženju kroz ronjenje, vizija Udruge je omogućiti ronjenje svima. Zahvaljujući takvom pristupu, u Udruzi se vrlo brzo okupio veliki broj aktivnih ronilaca koji nisu našli svoje mjesto u ronilačkim klubovima orijentiranima isključivo na profit. Cilj udruge je omogućiti i potaknuti napredovanje svih članova Udruge koji za to pokažu interes.'),
(4, 2, 'Šahovska udruga Varaždin', 'Šahovska udruga Varaždin osnovan je 1960. godine. U novijoj povijesti udruge 80-te godine prošlog stoljeća bile su vrlo bogate šahovskom aktivnošću u Varaždinu, 90-tih godina ta je aktivnost znatno smanjena zbog ratnih okolnosti, da bi nakon 2000. godine šah u Varaždinu dobio novi zamah zahvaljujući pomlađivanju članova i kontinuiranom radu s mladima.'),
(5, 18, 'Futsal udruga Varaždin', 'Futsal udruga Varaždin je udruga navijača Varaždina koja se temelji isključivo na entuzijazmu njezinih članova. Udruga je vlasništvo svih članova, bez uvijanja i bez birokratskih/pravnih smicalica i trikova. Udrugu vode članovi/navijači i ona je iznad svakog pojedinca. Onog trenutka kada navijač postane članom on postaje jedan od vlasnika koji ima pravo odlučivati i kreirati razvoj kluba. Glavni cilj udruge je okupljanje svih navijača Varaždina i očuvanja lojalnosti prema Varaždinu. S organizacijske strane cilj je da Futsal udruga Varaždin ne ovisi o niti jednom pojedincu već da bude samoodrživa i neovisana udruga.'),
(6, 18, 'Biciklistička udruga Varaždin', 'Budući da je Varaždin poznat kao grad bicikla, osnivanje udruge 2009. godine bio je samo jedan logičan korak koji pokazuje da je bicikl in. Cilj udruge je potaknuti ljude, ne samo iz našeg grada već i šire, na bavljenje tim sportom, kako rekreativno tako i natjecateljski, te time obogatiti sportsku varaždinsku scenu i upotpuniti mozaik uspješnosti varaždinskih sportaša.'),
(7, 18, 'Pikado udruga Varaždin', 'Pikado udruga Varaždin je službeno pravno registriran 2002. godine, ali okupljanje svojih članova i aktivnosti oko organizacije lokalnih turnira i sudjelovanja na tada rijetko organiziranim regionalnim natjecanjima pamti se od daleke 1996. godine. U to vrijeme pikado je bio na niskim granama zabave po kafićima i nije smatran sportom, što je tada, za pionire ovog sporta u Varaždinu bio izazov koji nisu propustili. Danas je Pikado udruga Varaždin je ponosan ostvarenim rezultatima svog aktivnog učešća u razvoju pikado sporta u Varaždinu, koji ima jednu od najjačih liga u Hrvatskoj, izuzetan broj mladih igrača te respektabilne igrače na globalnom planu.'),
(8, 18, 'Bowling udruga Varaždin', 'Bowling udruga Varaždin je osnovana u Varaždin, 2011. godine. Udrugu je osnovala nekolicina entuzijasta koji su se u ovaj sport zaljubili na prvi pogled (u osjećaj izbačaja kugle, u zvuk pogođenih čunjeva i u zadovoljstvo srušenog STRIKE-a). Cilj udruge je promovirati razumijevanje i usvajanje etičkih vrijednosti kroz rekreaciju i bavljenje tim sportom. Ovaj sport je već privukao naše sugrađane. Najčešće nepravilno drže kuglu, nevješto s njom koračaju te u pravilu neprecizno izbacuju kuglu na stazu što dovodi do slabijih rezultata. Misija udruge je naučiti ljude igrati bowling na ispravan način (teoretski i praktično) čime se osim poboljšavanja rezultata postiže efektniji zalet i izbačaj kugle te se sprječavaju ozljede.'),
(9, 2,'Paragliding udruga Varaždin', 'Paragliding udruga Varaždin osnovana je 1999. godine, gdje su se na osnivačkoj skupštini udruge okupili svi zaljubljenici u ovaj predivan sport. Udruga je član Hrvatskog zrakoplovnog saveza od dana osnivanja. Paragliding udruga Varaždin okuplja članove s područja Varaždinske županije. U Udruzi je sada učlanjeno više od 50 članova s područja gradova Krapine, Oroslavja, Zaboka te Pregrade i općina Đurmanec, Hum na Sutli, Jesenje, Mihovljan, Radoboj, Petrovsko, Zlatar Bistrice i Varaždina. Za sve ovo vrijeme Udruga djeluje neprekidno od osnivanja.');


INSERT INTO `aktivnost` (`aktivnost_id`, `udruga_id`, `datum_kreiranja`, `vrijeme_kreiranja`, `datum_odrzavanja`, `vrijeme_odrzavanja`,`naziv`,`opis`) VALUES
(1, 1, '2016-05-07', '12:00','2015-05-08','05:00', 'Izlet na Strahinjščicu','Planinarska udruga Varaždin organizirala je 8.5.2016. izlet na Strahinjščicu za djecu iz Varaždina uz pratnju odraslih članova. Organiziranim autobusnim prijevozom od Varaždina u 8 sati, Ivanca, Klenovnika do Lepoglave gdje je sastanak planinara, stižemo do naše polazne točke oko 10 sati u Gornjem Jesenju. Cilj ovog izleta bio je održavanje kondicije, kretanje u većim grupama, priprema za izlet na Risnjak, upoznavanje nove planinarske destinacije za djecu i neke odrasle članove. Na vrh Sušec (864 m) popeli smo se u vedrom raspoloženju uživajući u lijepoj planinskoj stazi i prekrasnom vidiku.'),
(2, 1, '2016-04-15', '11:00','2016-04-16','06:00', "Izlet na Oštrcgrad","Planinarska udruga Varaždin organizirala je u 16.4.2016. planinarenje za OŠ Klenovnik, OŠ Ivanec, OŠ Lepoglava i OŠ Maruševec na Oštrcgrad. Cilj ovog izleta bio je održavanje kondicije, priprema za izlet na Risnjak, upoznavanje Ivančice, zajedničko druženje i kretanje u većim grupama. Na Žganom vinu okupilo se je nekolicina planinara iz Ivanca, Lepoglave, Klenovika, Maruševca i Varaždina. Uspon je započeo preko Mrzljaka, groba neznanog junaka, preko Beliga i hrpta do Oštrcgrada. Odmor i osvježenje planinari su potražili u planinarskoj kući Majer, gdje ih je dočekao domar. Nakon odmora, povratak je bio cestom ispod Beliga do groba i preko Mrzljaka do Žganog vina. Mladi planinari su propješačili 14 kilometara, uspeli se na dva vrha Belige (974 m) i Oštcgrad (746 m), te uživali u prekrasnom proljetnom danu. Djecu su pratili vodiči Planinarske udruge Varaždin. Na izletu su sudjelovali i roditelji iz Ivanca i Lepoglave. Bio je to još jedan dobro osmišljen, organiziran i vođeni izlet Planinarske udruge Varaždin u kojem su djeca provela jedan lijepi dan u prirodi."),
(3, 1, '2016-03-05', '10:00','2016-03-06','04:00', "Pohod u Mariju Bistricu","Više desetaka planinara iz Varaždin i okolice sudjelovalo je na tradicionalnom pohodu u Mariju Bistricu, povodom Sv. BERNARDA – zaštitnika planinara, kojeg organiziraju članovi HPD Grohot i Turistička zajednica Marije Bistrice. Prekrasan dan, 6. ožujka izmamio je mnogobrojne planinare u prirodu, neke vlastitim automobilima, neke vlakom a najvjernije po starom hodočasničkom – vjerskom običaju ROMARSKIM PUTEM od Ivanca do Marije Bistrice preko Ivančice (Prekrižja – Selnice - Batine – Lipovca – Vinskog vrha – svetišta Marije Bistrice). Krenulo se rano ujutro oko 4 sata iz Prigorca na oko tridesetak kilometara dug put do svetišta u Mariji Bistrici. U jutro temperatura iznad 0 i mokrom snijegu i blatnjavom terenu, kasnije je osvanulo sunce i grijalo hodočasnike do odredišta i okupljanja na Vinskom vrhu, vratima svetišta, i zajednički krenulo na glavni trg i na Sv. misi, gdje su se okupili mnogi planinari, Međimurja, Podravine i Hrvatskog zagorja. A, kasnije i zajedničko druženje u restoranu „Prijetelj“ uz muziku i ples."),
(4, 1, '2015-07-02', '09:00','2015-07-03','05:00', "Pohod u Mosor","Članovi Planinarske udruge Varaždin u nedjelju su planinarili po Mosoru, najpopularnijoj planini Dalmacije. Nakon dolaska u mjesto Sitno Gornje, koje je bila polazna točka uspona krenuli su tzv. putem preko planinarske kuće Lugarnica koja se nalazi na nadmorskoj visini od 872 metra, do vrha Ljubljan, koji se nalazi na nadmorskoj visini od 1262 metra. Odatle je uspon nastavljen hrptom Mosora preko Vickovog stupa, na nadmorskoj visini od 1325 metra uslijedio, a zatim uspon na Veliki Kabl, koji je smješten na nadmorskoj visini od 1339 metara. Oba navedena vrha su kontrolne točke Hrvatske planinarske obilaznice. Povratak je izvršen od planinarskog doma Umberto Girometta, nadmorske visine od 868 metara do polazne točke, Sitno Gornje. Ukupno vrijeme pješačenja bilo je oko 6 sati hoda. Varaždinski planinari kući su se vratili u kasnim noćnim satima puni lijepih dojmova i utisaka, sa željom do sljedećeg susreta s planinama i druženja ,a to je društveni izlet koji će biti sredinom mjeseca srpnja i to u Dolomite."),
(5, 1, '2015-03-28', '08:00','2015-03-29','06:00', "Izlet na Pag","U organizaciji Planinarske udruge Varaždin 29.03.2015. je izvršen društveni izlet autobusom na otok Pag gdje je izvršen uspon na vrh Sveti Vid nadmorske visine 348 metara, koji je i kontrolna točka hrvatske planinarske obilaznice. Sam uspon izvršen je iz mjesta Dubrave na otoku Pagu u trajanju sat vremena po lijepom i sunčanom vremenu, a nakon zadržavanja na samom vrhu Sveti Vid koji je predivan vidikovac na ovaj dio Jadrana i Velebit kraj kojeg se paralelno pruža, planinari su krenuli na drugu stranu otoka u mjesto Šimun gdje su se odmorili i uživali u ljepotama otoka Paga. U povratku su krenuli preko Karlobaga i Oštarijskih vrata te posjetili vidikovac Kubus koji je velika klesana kamenita kocka postavljena na četiri kamene kugle odakle se pruža lijep vidik na more i zatim se preko Gospića vratili u Varaždin."),
(6, 2, '2016-02-25', '13:00','2016-02-26','06:00', "Izlet na Pohorje","U organizaciji Skijaške udruge Varaždin dvadesetak je Varaždinaca željnih snijega krenulo na trodnevni izlet put Maribora. Smješteni u tradicionalno, novorenoviranim apartmanima Bolfenk čija je ponuda odnedavno obogaćena i wellness centrom (bazen, sauna, whirlpool). Unatoč vremenskim neprilikama zbog manjka padavina domaćini su se potrudili osigurati dovoljno snijega na stazama pa smo dnevno-noćni skipass dobro iskoristili. Druženje se nastavilo i u večernjim satima kada je organiziran karaoke show gdje smo odmjerili snage pjevajući u slučajno odabranim parovima. U ugodnom društvu i dobrom raspoloženju vrijeme je brzo prolazilo pa je tako zajednički ručak pred odlazak samo potvrdio da smo svi poželjeli isto - okupiti se ponovo u ožujku. I na kraju, uz vrlo povoljnu cijenu aranžmana dobili smo i nešto što se ne može kupiti novcem - nova poznanstva."),
(7, 2, '2016-03-11', '14:00','2016-03-12','05:00', "Natjecanje u Sillianu","U sklopu natjecanja GORENJE CUP Skijaška udruga Varaždin je pod pokroviteljstvom Grada Varaždina i TRIGLAV osiguranja bila organizator utrka u austrijskom Sillianu, a razlog tomu je nedostatak snijega na matičnom skijalištu. Članovima varaždinskoga tima pružila se je tako prilika upoznati se sa ljepotama ovoga pitoresknoga skijališta na samoj granici sa Italijom. Staze, cca 45km, duge i odlično pripremljene, a snijega u izobilju. Žice solidne, 3 vučnice, 2 četverosjeda i 2 gondole osiguravaju dovoljno skijanja. Za one koji se ne žele vratiti gondolom pravi je užitak spustiti se sa vrha od 2407m u dolinu na 1087m i tako u desetak minuta savladati visinsku razliku od 1320m. Smještaj u apartmanskom naselju je na visokoj razini a prehrana u objektu Schlosswirt zaslužuje ocjenu +5. Još jedan bijeg iz svakodnevnice ostat će tako zabilježen i prvim iskustvima u natjecateljskom dijelu skijanja!"),
(8, 2, '2015-08-31', '10:15','2015-09-01','12:00', "Izlet na Möltall","Iako većina naših sugrađana još uvijek svoj odmori provodi u moru i okolo njega neki su se odlučili za snijeg! Mlađi i stariji članovi Skijaške udruge Varaždin iskoristili su posljednje dane pred početak školske godine i posjetili austrijski ledenjak Möltall. Vrijeme je uglavnom bilo sunčano uz prolaznu naoblaku, temperature do 0-10°C, snijeg dobar do 13-14h tako da su svi zacrtani zadaci odrađeni po programu. Pauze smo uz okrijepu ugodno iskoristili i za malo sunčanja a dalmatinska pjesma ponovo je bila nezaobilazna. Imali smo i goste iz susjedne BiH. Poslijepodne je bilo dovoljno vremena za sportske aktivnosti, a prohladne noći pravi spas nakon dugih ljetnih vrućina."),
(9, 2, '2015-01-01', '13:30','2015-01-02','05:00', "Izlet na Valmeinier","Skupina od dvadesetak zaljubljenika uputila se u daleki Valmeinier, 40-ak km nakon tunela Frejus koji dijeli Italiju i Francusku. Oko 1160km puta svladali smo za cca 14h jer se je 3h izgubilo čekajući na ulazu u tunel koji propušta vozila sa obaveznim razmakom od 150m. No, sve su muke nestale kad je svanuo novi dan. Apartmanske kuće su smještene na 1800 m/nmv na pedesetak metara od skijaških staza a stotinjak metara nizbrdo je prva žica. Skijalište ima preko 100km staza jer je povezano sa drugom dolinom Valloire tako da svatko može doći na svoje. Snijeg je izjutra bio leden što je za većinu bio mali problem ali je nakon par sati skijanje bilo ugodno."),
(10, 2, '2015-12-08', '09:45','2015-12-09','04:00', "Izlet na Sillian","Otvaranje sezone je za većinu poseban događaj nakon pauze od nekoliko mjeseci. Redovito su to ugodna skijanja po novome snijegu kad i temperature nisu previše u minusu. Ove je godine izbor pao na Sillian, malo skijalište u istočnom Tirolu sa nekih 45km staza. Smještaj je bio organiziran u Sport hotelu te u pansionu Pichler u samom središtu mjesta. Snijeg je ove godine pao dosta kasno pa nisu bile otvorene sve staze zbog čega smo kombinirali sa odlaskom na glečer koji od prošle sezone ima 15-ak km novih staza te fun-park. Vrijeme nam je uglavnom bilo naklonjeno iako glečer često iznenadi sa naglim promjenama. S osmijehom na licu redali su se kilometri sniježnih staza. No, ono najvažnije, boravak na snijegu i skijama ponovo je ispunio naše duše pa sa još većim nestrpljenjem očekujemo odlazak na veliko skijanje!"),
(11, 2, '2015-01-06', '12:00','2015-01-07','06:00', "Izlet na Puy St.Vincent ","Ovogodišnja destinacija poznata je među skijašima, relativno malo skijalište od 75km ali dovoljno raznoliko za sve kategorije i uzraste. Hoteli i apartmani smješteni su na 3 nivoa – 1400, 1600 i 1800m. Svi objekti su vrlo blizu staza, do 50m a novije su gradnje tako da su apartmani veličine 35 – 50mq što je za Francusku iznad standarda. Ski karta na ovom području uključuje još 6 obližnjih skijališta ( Alpe d'Huez, Les deux Alpes, Serre Chevalier, Montgenevre, Sestriere, Pelvoux ) međutim zbog zavojitih cesta kojima se treba voziti gubi se dosta vremena pa smo iskoristili samo jedan dan za posjet u talijanski Sestriere. Bez obzira na dužinu vožnje od 10-12h (ovisno da li idete osobnim ili kombi vozilom) ocjena je čista petica."),
(12, 3, '2016-04-08', '10:15','2016-04-09','12:00', "Natjecanje Kašpsvar","U subotu, 9.4.2016., mnogobrojna ekipa mlađih kadeta i seniora Ronilačke udruge Varaždin uputili su se na natjecanje u Mađarsku. Ondje se održavalo njihovo regionalno natjecanje „Diamant kup“ te je ekipa Ronilačke udruge Varaždin, uz 3 zagrebačka kluba, bila jedan od inozemnih predstavnika među brojnim mađarskim plivačima perajama. Ovim natjecanjem naši su najmlađi, uz pratnju starijih plivača, skupljali iskustva na inozemnom natjecanju kako bi i oni jednog dana mogli predstavljati klupske boje diljem Europe. Također, kako su kadeti imali državno tjedan dana ranije, ovo im je bila odlična prilika da pokušaju još jednom isplivati svoja najbolja vremena."),
(13, 3, '2016-03-17', '12:15','2016-13-18','05:00', "Svjetski kup Lignano","Dan 18.3.2016., obilježio je nastup ekipe Ronilačke udruge Varaždin na Svjetskom kupu u talijanskom gradu Lignanu. Na samom natjecanju okupilo se 29 ekipa sa ukupno 354 natjecatelja iz raznih država svijeta. Samo natjecanje obilježili su svjetski rekordi plivača i plivačica perajama iz Češke i Mađarske, ali i nacionalni rekordi hrvatskih predstavnika. Plivalo se je perajama ma 200m, 400m i 800m.");


INSERT INTO `sudionik` (`aktivnost_id`, `korisnik_id`) VALUES
(1, 3),
(2, 3),
(3, 3),
(1, 8),
(2, 8),
(3, 4),
(4, 4),
(5, 4),
(1, 4),
(2, 4),
(1, 9),
(1, 5),
(2, 5),
(3, 5),
(4, 5),
(5, 5),
(1, 10),
(1, 6),
(2, 6),
(3, 6),
(4, 6),
(5, 6),
(1, 11),
(1, 7),
(2, 7),
(3, 7),
(4, 7),
(5, 7);


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
