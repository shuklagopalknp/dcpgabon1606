<?php
//echo "<pre>", print_r($otherinfo[0]['frais_de_dossier']), "</pre>"; exit;
$dob=explode('-', $pinfo[0]["dob"]);
$dobreples=date('d-m-Y', strtotime($pinfo[0]["dob"]));
$d=array($dobreples);
$main_phone=$adinfo[0]["main_phone"];
$mp=array($main_phone);
$empinfo[0]['employer_name'];
$empdate=date('d-m-Y', strtotime($empinfo[0]['employment_date']));
$ed=array($empdate);
if(!empty($riskfsituation)){
$Ratio=$riskfsituation[0]['coeficientendettement'];
}else{$Ratio='00';}

?>

<?php
$databinding = json_decode($this->data['appformD'][0]['databinding'], true);
$monthly_payment = $databinding[0]['monthly_payment'];
$lastPaymentMonth = $databinding[count($databinding)-1]['month'];
$lastPaymentYear = $databinding[count($databinding)-1]['years'];
$lastDateLoanPayment = $lastPaymentMonth.'/'.$lastPaymentYear;
?>
<html>
    <head> 
        <style>
            .heading_c{
                color:#3276b1;
            }

             ul { list-style-type: none; }
        </style>
    </head>
<body translate="no" style="background-color: #e2e1e0; font-family: Open Sans, sans-serif; font-size: 100%; font-weight: 400; line-height: 1.4; color: #000; margin: 0;text-align:center;">

    <table style="width: 800px; background-color: #fff; margin: 50px auto; padding: 20px;">
        <tbody>
            <tr>
                <td>
                    <table style="width: 100%;">
                        <tbody>
                            <tr>
                                <td style="position: relative;"></td>
                                <td style="width: 100%; text-align: center;">
                                    <span style="font-weight: bold; font-size: 20px;">CONVENTION DE CREDIT EN COMPTE COURANT</span> 
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>

             <tr>
                <td>
                    <table style="width: 100%;">
                        <tbody>
                            <tr>
                                <td style="position: relative;"></td>
                                <td style="width: 100%; text-align: justify">
                                    <span style="font-size: 12px;font-weight: 600">ENTRE LES SOUSSIGNES</span>
                                    <div style="border:1px solid #000;margin:10px 0px;padding:5px" >

                                    <span style=" font-size: 12px;">Banque Atlantique Cameroun par abr??viation ??BACM ??, Soci??t?? Anonyme avec Conseil d???Administration au capital social de Treize milliards de francs CFA  (13 000 000 000 FCFA ) dont le si??ge social est ?? Akwa, Douala , boite postale num??ro 2933 Douala Cameroun, immatricul??e au Registre du Commerce et du Cr??dit Mobilier de Douala ??? Bonanjo le 19 juin 2008 sous le num??ro RC/DLA/2008/B/1195, avec inscription modificative le 16 septembre 2015 sous le num??ro RC/DLA/2015/M/4385 ; </span> 
                                    <br/>
                                    <span style="float:right;font-style: italic;font-size: 12px;">Ci- d??nomm??e "LA BANQUE" d???une part ;</span>
                                </div>

                                <span style="font-size: 12px;font-weight: 600">ET</span>
                                    <div style="border:1px solid #000;margin:8px 0px;padding:5px" >

                                    <span style=" font-size: 12px;">M/Mme __<?php echo ucfirst($pinfo[0]['last_name']) ?: ' ';?>_<?php echo ucfirst($pinfo[0]['middle_name']) ?: '';?>_<?php echo ucfirst($pinfo[0]['first_name']) ?: ' ';?>__
            N?? le___<?php echo date("d-m-Y", strtotime($pinfo[0]["dob"]));?>__ ?? __<?php echo $pinfo[0]['place_of_birth']?>__ de ___<?php echo $adinfo[0]['father_fullname']?>__ et de ___<?php echo $adinfo[0]['mother_fullname']?>___
            Demeurant ?? ___<?php echo $adrs[0]['city_id'] ?>___ ; Contact t??l??phonique : ___<?php echo $adinfo[0]['main_phone'] ?>___ Fonction : __<?php echo strtoupper($adinfo[0]['occupation']) ?: '-';?>__ Employeur : ____<?php echo strtoupper($empinfo[0]['employer_name']) ?: '_';?>___ BP : ___<?php echo $adrs[0]['resides_address'] ?: '-';?> <?php echo $adrs[0]['Nom de la rue'] ?: '-';?>_ ,<?php echo $adrs[0]['city_id'] ?: '-';?>__ ; Matricule __<?php echo $pinfo[0]['registration_no']?>__ 
            Titre d???Identification : ___<?php echo  $adinfo[0]['type_id'];?>___ ; N?? __<?php echo $adinfo[0]['id_number'] ?: '-';?>__  d??livr??(e) le _<?php if($adinfo[0]['room_type']) echo date('d-m-Y', strtotime($adinfo[0]['room_type']));?>__ ??  ___<?php echo $adinfo[0]['place_of_establishment_typeid'] ?: '-';?>___</span>
    <br/>
        <span style="font-style: italic;float: right;font-size: 12px;">
        Ci-d??nomm??(e) ?????? l???EMPRUNTEUR?????? d???autre part ;
         </span> 

                                </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td>
                    <table style="width: 100%;">
                        <tbody>
                            <tr>
                                <td style="position: relative;"></td>
                                <td style="width: 100%;">
                                    <div style="text-align: center;">
                                    <span class="heading_c" style="font-weight: bold; font-size: 12px; ">IL A ETE PREALABLEMENT EXPOSE CE QUI SUIT :</span>
                                    </div>
                                    <hr/> 
                                    <span style=" font-size: 12px;">
                                        La banque atlantique Cameroun a ??t?? sollicit??e par le BENEFICIAIRE,  pour l???ouverture, en compte courant, d???une facilit?? sous forme de ______ plafonn??e au montant de __________FCFA, destin??e ?? ______________.La Banque s???y ??tant dispos??e, les Parties se sont rapproch??es pour mat??rialiser leur accord dans les termes de la pr??sente convention de compte courant, avec laquelle le pr??sent pr??ambule forme un tout indivisible : 
                                    </span>

                                    <div style="text-align: center;">
                                    <span class="heading_c" style="font-weight: bold; font-size: 12px; ">CECI EXPOSE, IL A ETE CONVENU ET ARRETE CE QUI SUIT :</span>
                                    </div>
                                     <hr/> 
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td>
                    <table style="width: 100%;">
                        <tbody>
                            <tr>
                                <td style="width: 50%; vertical-align: top; padding-right: 10px;">
                                    <table>
                                        <tbody>
                                            <tr>
                                                <td colspan="2" style="height: 30px; width: 100%;"></td>
                                            </tr>

                                            <tr>
                                                <td colspan="2" style="width: 50%; font-size: 16px; font-weight: normal; line-height: 19px;">
                                                    <span class="heading_c" style="display: block; font-size: 13px; font-weight: 600;">
                                                      Article 1 : DU COMPTE COURANT
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" style="width: 50%; font-size: 16px; font-weight: normal; line-height: 15px;">
                                                    <span style="display: block; font-size: 12px; padding: 0; font-weight: 400; text-align: justify;">
                                                       La BANQUE et le BENEFICIAIRE sont convenus, d??s avant ce jour, de faire entrer dans un compte courant toutes les op??rations qu???elles pourraient avoir ?? traiter ensemble. En cons??quence, les remises effectu??es en compte courant se traduisent et continueront ?? se traduire en simples articles de cr??dit et de d??bit, destin??s ?? se balancer ?? la cl??ture du compte courant en un solde seul exigible.
                                                       <br/> <br/>
                                                       Le compte courant, en raison de son caract??re de g??n??ralit??, englobe et continuera d???englober tous les rapports d???obligations qui existent et existeront entre le BENEFICIAIRE et la BANQUE. Il en sera ainsi lors m??me que les op??rations seraient comptabilis??es dans des comptes diff??rents m??me tenus dans des si??ges diff??rents, tous les comptes ouverts au BENEFICIAIRE par la BANQUE devant ??tre consid??r??s comme des chapitres du compte courant, ?? moins que les op??rations port??es ?? certains de ces comptes ne soient, par exception, exclues du compte courant.
                                                        <br/> <br/>
                                                       De m??me le compte courant comprendra, sauf l???exception ci-dessus pr??vue, les cr??ances dont la cause serait ant??rieure ?? la cl??ture du compte, mais qui, encore ??ventuelles ?? cette date, ne na??traient au profit de la BANQUE qu???apr??s la cl??ture de celui-ci, telles notamment que les recours susceptibles d?????tre exerc??s par la BANQUE si elle s?????tait port??e caution ou avaliste du BENEFICIAIRE avant la cl??ture du compte, ou encore la cr??ance que la BANQUE pourrait ??tre amen??e ?? faire valoir ?? l???encontre du BENEFICIAIRE si ce dernier s?????tait port?? caution ou avaliste envers la BANQUE avant la cl??ture du compte.  
                                                        <br/> <br/>
                                                       En cons??quence du transfert de la propri??t?? d???effets ?? son profit, r??sultant, soit de la cr??ation, soit de l???endossement de tels effets ?? son ordre, la BANQUE portera au cr??dit du compte le montant des effets ainsi remis; cette inscription aura lieu sous r??serve d???encaissement. En cas de non-paiement d???effets ?? leur ??ch??ance, la BANQUE pourra toujours, ?? sa seule convenance et ?? toute ??poque, contre-passer le montant des effets impay??s, qu???elle ait ou non ?? exercer des recours cambiaires contre les cooblig??s. La contre-passation du montant d???un effet laissera subsister le droit de propri??t?? de la BANQUE sur ledit effet.
                                                        <br/> <br/>
                                                       Toutefois, la BANQUE annulera l???endos fait ?? son profit ou r??endossera, sans garantie, au profit du BENEFICIAIRE, les effets dont le montant aura ??t?? contre-pass??, si au moment de la contre-passation le compte comporte une provision suffisante pour couvrir le montant contre-pass??. Dans cette hypoth??se, les effets en cause seront restitu??s au BENEFICIAIRE.
                                                        <br/> <br/>
                                                        Le BENEFICIAIRE dispense la BANQUE de tous prot??ts et de tous avis de non-acceptation ou de non-paiement pr??vus par le Code de Commerce. La BANQUE conservera, nonobstant le d??faut de prot??ts et d???avis, son recours contre le BENEFICIAIRE et son droit de contre-passer le montant des effets impay??s.
                                                         <br/> <br/>
                                                        Les s??ret??s et privil??ges affect??s ?? la garantie du pr??sent contrat de pr??t continueront de garantir le solde exigible du compte courant du BENEFICIAIRE, m??me en cas de remboursement total du pr??t et de toutes les traites dues ; 
                                                         <br/> <br/>
                                                        En tout ??tat de cause et ?? tout moment, la BANQUE pourra exiger la production de garanties suppl??mentaires si elle juge insuffisantes celles d??crites ?? l'article 9 du pr??sent contrat. Les remises effectu??es au titre du compte courant se traduisent et continueront de se traduire en simples articles de cr??dit et de d??bit destin??s ?? se balancer ?? tout moment en un solde exigible. 
                                                         <br/> <br/>
                                                        Tous les comptes ouverts au BENEFICIAIRE, y compris les comptes de d??classement des cr??ances, sont consid??r??s comme des chapitres du compte courant du BENEFICIAIRE, et demeureront gouvern??s par le principe d???unicit?? de compte. Feront notamment partie int??grante  de ce compte unique , tous comptes  tenus dans n???importe quel agence de la Banque au nom du BENEFICIAIRE, qu???ils soient ou non soumis  ?? des taux  ou conditions particuli??res, ouverts ?? des titres et pour des mobiles distincts  ou sous des num??ros  diff??rents, ?? l???initiative du A l?????ch??ance de toute facilit??, les int??r??ts courront sur l???encours des engagements impay??s au taux de d??couvert standard de dix-sept pourcent (17%) hors taxes conform??ment aux conditions g??n??rales de banque. De m??me, ?? l?????ch??ance finale des facilit??s, les int??r??ts courront sur l???encours des engagements impay??s au taux de d??couvert standard de dix-sept pourcent (17%) ?? d??faut de renouvellement ou de prorogation.
                                                         <br/> <br/>
                                                         Toute demande de prorogation sera formul??e au plus tard un (01) mois avant l?????ch??ance. En cas de prorogation de ligne, le taux d???int??r??t conventionnel stipul?? ?? l???alin??a 1er sera major?? de deux (02) points. En cas de prorogation d???effets, le taux d???escompte sera major?? d???un (01) point, sans pr??judice de la perception des frais de prorogation conform??ment aux conditions g??n??rales de banque.
                                                         <br/> <br/>
                                                         D??s le lendemain de la cl??ture du compte courant, les int??r??ts courront sur le solde du compte et sur tous les accessoires au taux de d??couvert standard susvis?? major?? de deux points jusqu????? parfait paiement. Ils seront exigibles ?? tout instant, et si, par suite de retard de paiement, ils sont dus pour une ann??e enti??re, ils produiront eux-m??mes int??r??ts conform??ment ?? l???article 1154 du Code Civil. 
                                                         <br/> <br/>
                                                         Le Taux Effectif Global (TEG) applicable au Cr??dit s?????tablit ?? ____. Il exprime le co??t r??el du Cr??dit, int??r??ts et frais accessoires compris.
                                                          <br/> <br/>
                                                         Les parties reconnaissent que le Taux Effectif Global applicable au Cr??dit est consenti en de???? du Taux d???Usure, lequel s?????tablit ?? _____ ?? la date du pr??sent acte. 
                                                             <br/> <br/>
                                                         Tous imp??ts ou taxes auxquels pourraient donner lieu les int??r??ts et commissions, seront ?? la charge du BENEFICIAIRE et suivront le sort desdits int??r??ts et commissions auxquels ils seront aff??rents.

                                                    </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" style="height: 0; width: 100%;"></td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" style="width: 50%; font-size: 16px; font-weight: normal; line-height: 19px;">
                                                    <span  class="heading_c" style="display: block; font-size: 13px; font-weight: 600;">
                                                        ARTICLE 4 : ACCESSOIRES
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" style="width: 50%; font-size: 16px; font-weight: normal; line-height: 15px;">
                                                    <span style="display: block; font-size: 12px; padding: 0; font-weight: 400; text-align: justify;">
                                                       Pendant la dur??e du compte courant, il sera port?? toutes les avances que la BANQUE pourra ??tre  amen??e ?? faire ?? l???occasion du pr??sent acte ou de ses suites, notamment tous imp??ts, droits et taxes quelconques que la BANQUE pourra ??tre amen??e ?? payer aux lieu et place du  BENEFICIAIRE, notamment par suite de solidarit?? l??gale.  <br /><br />
                                                       Apr??s la cl??ture du compte courant, les avances qui pourront ??tre faites constitueront des accessoires du solde du compte courant, cr??ance principale. Dans cette hypoth??se, elles seront remboursables sans d??lai et seront productives d???int??r??ts au taux major?? sus-indiqu?? ?? compter du jour o?? elles auront ??t?? faites.
                                                         <br /><br />
                                                         Ces int??r??ts seront exigibles ?? tout moment, ainsi que tous imp??ts ou taxes dont ils pourraient devenir passibles. 
                                                        
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" style="height: 0; width: 100%;"></td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" style="width: 50%; font-size: 16px; font-weight: normal; line-height: 19px;">
                                                    <span  class="heading_c" style="display: block; font-size: 13px; font-weight: 600;">
                                                       ARTICLE 5 : COMMUNICATIONS A FAIRE A LA BANQUE
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" style="width: 50%; font-size: 16px; font-weight: normal; line-height: 15px;">
                                                    <span style="display: block; font-size: 12px; padding: 0; font-weight: 400; text-align: justify;">
                                                        Tant que le BENEFICIAIRE sera susceptible d?????tre d??biteur en vertu des pr??sentes, il devra : </br><br/>
                                                        
                                                        <ul>
                                                            <li>-   Informer la BANQUE dans un d??lai de trentaine de tous faits susceptibles d???affecter s??rieusement l???importance ou la valeur de son patrimoine ou d???augmenter sensiblement le volume de ses engagements ; </li>
                                                            <li>-   Tenir la BANQUE inform??e de toutes modifications et transformations affectant sa forme juridique et/ou capacit?? (notamment r??glement amiable, cessation de paiement ou d???activit??s, etc.), ainsi que toutes autres situations de droit ou de fait susceptibles d???avoir les m??mes effets. </li>
                                                        </ul>
                                                        

                                                    </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" style="height: 0; width: 100%;"></td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" style="width: 50%; font-size: 16px; font-weight: normal; line-height: 19px;">
                                                    <span  class="heading_c" style="display: block; font-size: 13px; font-weight: 600;">
                                                       ARTICLE 6 : MOBILISATION EVENTUELLE
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" style="width: 50%; font-size: 16px; font-weight: normal; line-height: 15px;">
                                                    <span style="display: block; font-size: 12px; padding: 0; font-weight: 400; text-align: justify;">
                                                       
                                                       Si des avances sont consenties ou promises par la BANQUE, celle-ci pourra exiger que des effets soient tir??s, souscrits ou accept??s ?? son ordre par le BENEFICIAIRE. 
                                                        <br/><br/>
                                                        Le transfert de la propri??t?? de ces effets au profit de la BANQUE produira les cons??quences pr??vues ?? l???article 1, dont les dispositions seront applicables ?? la suite de l???op??ration.
                                                       
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" style="height: 0; width: 100%;"></td>
                                            </tr>
                                            
                                            
                                            <tr>
                                                <td colspan="2" style="width: 50%; font-size: 16px; font-weight: normal; line-height: 19px;">
                                                    <span class="heading_c" style="display: block; font-size: 13px; font-weight: 600;">
                                                        ARTICLE 7 : DUREE - CLOTURE 
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" style="width: 50%; font-size: 16px; font-weight: normal; line-height: 15px;">
                                                    <span style="display: block; font-size: 12px; padding: 0; font-weight: 400; text-align: justify;">
                                                        Les concours objets des pr??sentes sont consentis pour la dur??e pr??vue ?? l???article 2 ci-dessus. 
                                                        <br/><br/>
                                                        Le compte courant est convenu pour une dur??e ind??termin??e. Il pourra ??tre cl??tur?? ?? tout instant. La cl??ture interviendra ?? la date de l?????mission de l???avis de cl??ture qui sera donn?? ou adress?? ?? l???autre par celle des parties qui voudra mettre fin au compte, ?? moins que cette partie n???ait dans son avis, fix?? la cl??ture du compte ?? une date ult??rieure. 
                                                        <br/><br/>
                                                        D??s cet instant, pour le cas o?? le compte enregistrerait un d??couvert ?? dur??e ind??termin??e autre qu???occasionnel, la BANQUE s???engage ?? fixer la date de cl??ture du compte au moins trente (30) jours ?? partir de la date d???envoi d???une notification par lettre recommand??e avec accus?? de r??ception ou lettre contre d??charge qui sera donn??e ou adress??e ?? l???autre par celle des parties qui voudra mettre fin au compte. 
                                                        <br/><br/>
                                                        Conform??ment aux dispositions l??gales, la BANQUE ne sera pas tenue de respecter ce d??lai de pr??avis en cas de : 
                                                        <ul>
                                                            <li>- comportement gravement r??pr??hensible du BENEFICIAIRE ou de situation irr??m??diablement compromise de celui-ci ;</li>
                                                            <li>-   concours accord?? ?? titre occasionnel et exceptionnel au BENEFICIAIRE ;</li>
                                                        </ul>
                                                        consid??r??e comme d??finitivement approuv??e, et aucune contestation ne sera recevable devant les tribunaux. 
                                                        <br/><br/>
                                                        La Banque s???engage n??anmoins ?? conserver en originaux ou sur support ??lectronique pendant dix (10) ans au maximum, les extraits de compte et les pi??ces comptables relatives aux op??rations initi??es par le BENEFICIAIRE.
                                                    </span>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td colspan="2" style="height: 10px; width: 100%;"></td>
                                            </tr>


                                              <tr>
                                                <td colspan="2" style="width: 50%; font-size: 16px; font-weight: normal; line-height: 19px;">
                                                    <span class="heading_c" style="display: block; font-size: 13px; font-weight: 600;">
                                                        ARTICLE 10 : LIQUIDATION DES OPERATIONS EN COURS DE CLOTURE
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" style="width: 50%; font-size: 16px; font-weight: normal; line-height: 15px;">
                                                    <span style="display: block; font-size: 12px; padding: 0; font-weight: 400; text-align: justify;">
                                                       Lors de la cl??ture du compte, son solde ne sera ??tabli que sous r??serve de la liquidation des op??rations en cours. 
                                                        <br/><br/>
                                                        A titre de liquidation des op??rations en cours, la BANQUE aura notamment la facult?? de: 
                                                        <ul>
                                                            <li>- contre-passer, apr??s la cl??ture du compte le montant des effets impay??s ; </li>
                                                            <li>-  porter au d??bit de ce compte les sommes qu???elle sera amen??e ?? payer post??rieurement ?? la cl??ture en ex??cution de ses engagements de caution, d???avaliste ou autres engagements pris en faveur du BENEFICIAIRE ; </li>
                                                            <li>-  et d???une mani??re g??n??rale, porter au d??bit du compte toutes les sommes susceptibles de lui ??tre dues par le BENEFICIAIRE post??rieurement ?? la cl??ture en vertu d???engagements quelconques du BENEFICIAIRE ant??rieurs ?? la cl??ture du compte.  </li>
                                                        </ul>
                                                        Le solde d??finitif du compte sera arr??t?? une fois cette liquidation effectu??e et compte tenu de ses r??sultats.  
                                                        
                                                    </span>
                                                </td>
                                            </tr>


                                              <tr>
                                                <td colspan="2" style="width: 50%; font-size: 16px; font-weight: normal; line-height: 19px;">
                                                    <span class="heading_c" style="display: block; font-size: 13px; font-weight: 600;">
                                                        ARTICLE 11 : LIEU DE PAIEMENT  
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" style="width: 50%; font-size: 16px; font-weight: normal; line-height: 15px;">
                                                    <span style="display: block; font-size: 12px; padding: 0; font-weight: 400; text-align: justify;">
                                                        1*) Les concours objet des pr??sentes seront log??s dans le compte courant num??ro _________ .
                                                        <br/><br/>
                                                        2*) Le paiement des cr??ances r??sultant au profit de la BANQUE de la cl??ture du compte aura lieu au Si??ge de la banque ou ?? toute autre agence de la banque. 
                                                       
                                                    </span>
                                                </td>
                                            </tr>



                                              <tr>
                                                <td colspan="2" style="width: 50%; font-size: 16px; font-weight: normal; line-height: 19px;">
                                                    <span class="heading_c" style="display: block; font-size: 13px; font-weight: 600;">
                                                       ARTICLA 12 :    DECHEANCE DU TERME ??? EXIGIBILITE ANTICIPEE
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" style="width: 50%; font-size: 16px; font-weight: normal; line-height: 15px;">
                                                    <span style="display: block; font-size: 12px; padding: 0; font-weight: 400; text-align: justify;">
                                                        Le concours stipul?? ?? l???article 2 ci-avant deviendra imm??diatement exigible dans les cas suivants :
                                                        <ul>
                                                            <li>- A d??faut d???inex??cution d???un seul des engagements pris au pr??sent acte par le BENEFICIAIRE, notamment sous l???article intitul?? ?? Communication ?? faire ?? la BANQUE ?? ;</li>
                                                            <li>-   En cas d???inexactitude d???une seule des d??clarations faites au pr??sent acte, notamment au sujet de la situation globale de l???entreprise, ?? moins que les inconv??nients pouvant r??sulter d???une situation non-conforme aient cess?? d???exister ;</li>
                                                            <li>-   A d??faut de paiement par le BENEFICIAIRE de ses contributions, taxes et prestations sociales et autres ;</li>
                                                            <li>-   En cas de fusion, dissolution, transfert de si??ge social du BENEFICIAIRE ?? une autre ville ;</li>
                                                            <li>-   En cas d???absorption, de liquidation, de redressement judiciaire, d???ouverture d???une proc??dure collective ?? l???encontre du BENEFICIAIRE ;</li>
                                                            <li>-   Au cas o?? le BENEFICIAIRE ne souscrirait pas ?? l a premi??re demande de la BANQUE, un des billets dont la souscription ??ventuelle sera pr??vue ci-apr??s ;</li>

                                                            <li>-   En cas de maintien par le BENEFICIAIRE de son compte courant sans mouvements cr??diteurs pendant une dur??e sup??rieure ou ??gale ?? quarante cinq (45) jours ;</li>
                                                            <li>-   En cas de d??ch??ance de droit, de tout ou une partie des garanties convenues, ?? moins que le BENEFICIAIRE ait pourvu ?? leur remplacement ;</li>
                                                            <li>-   En cas de comportement gravement r??pr??hensible ou de situation irr??m??diablement compromise du BENEFICIAIRE ; </li>
                                                            <li>-   En cas de production ou d???usage de faux documents ;</li>
                                                            <li>-   En cas de disparition irr??m??diable de la source de remboursement ;</li>
                                                            <li>-   Tout ??v??nement de nature ?? affecter la qualit?? de la signature du BENEFICIAIRE, ou pouvant entra??ner un risque pour la BANQUE de non recouvrement de sa cr??ance.</li>
                                                        </ul>
                                                        Si une seule de ces hypoth??ses se r??alisait, la BANQUE pourrait exiger le remboursement des fonds mobilis??s dans le cadre du pr??sent concours, du solde du compte courant ou ce qui resterait alors d?? imm??diatement et sans aucune formalit??. Cependant, en ce qui concerne le cas pr??vu ?? l???alin??a 6 ci-dessus, l???exigibilit?? n???aurait lieu que quinze jours apr??s l???envoi d???une lettre par voie d???huissier indiquant l???intention de la BANQUE de se pr??valoir de la pr??sente clause. Les paiements ou r??gularisations post??rieurs ne feront pas obstacle ?? cette exigibilit??. 
                                                        <br/><br/>
                                                       En cas d???usage de faux documents, le BENEFICIAIRE et ses cooblig??s s???exposent en vertu des dispositions de la loi N??2019/021 du 24 d??cembre 2019 fixant certaines r??gles relatives ?? l???activit?? de cr??dit dans les secteurs bancaires et de la Microfinance au Cameroun qui dispose : 
                                                        <br/><br/>
                                                        ?? Art.22 : Est punie d'un emprisonnement de six (06) mois ?? trois (03) ans et d'une amende de cent mille (100.000) ?? cinq millions (5.000.000) de francs CFA, ou de l'une de ces deux peines seulement, toute personne qui, avec l'intention de porter atteinte aux droits de l'??tablissement assujetti, fait usage ou tente de faire usage de faux documents dans le cadre de la conclusion d'une op??ration de cr??dit ??.
                                                        
                                                         
                                                        <br/><br/>
                                                        Dans tous les cas, les sommes devenues exigibles seront major??es de deux pour cent (2 %) et per??ues par la BANQUE ?? titre de p??nalit??s.
                                                        <br/><br/>
                                                        16.2 ??? En cas de survenance d???un Incident de Cr??dit, le BENEFICIAIRE s???expose ?? une interdiction de cr??dit, emportant interdiction de conclure une op??ration de cr??dit aupr??s de tout autre ??tablissement bancaire ou de Microfinance ; le BENEFICIAIRE ne recouvrera la facult?? de conclure une op??ration de cr??dit que s???il justifie avoir r??gularis?? sa situation en remboursant en principal et int??r??ts, la cr??ance objet de l???incident de cr??dit.
                                                        <br/><br/>
                                                        16.3 ??? Le BENEFICIAIRE s???expose pareillement aux sanctions p??nales ??dict??es par la loi susvis??e, laquelle dispose :
                                                        <br/><br/>
                                                        ?? Art.20 : Est punie d'un emprisonnement de six (06) mois ?? cinq (05) ans et d'une amende de cent mille (100.000) ?? cent millions (100.000.000) de francs CFA, ou de l'une de ces deux peines seulement, toute personne qui, de mauvaise foi, n'a pas rembours?? le cr??dit qui lui a ??t?? accord?? par un ??tablissement assujetti ??.
                                                    </span>
                                                </td>
                                            </tr>


                                              <tr>
                                                <td colspan="2" style="width: 50%; font-size: 16px; font-weight: normal; line-height: 19px;">
                                                    <span class="heading_c" style="display: block; font-size: 13px; font-weight: 600;">
                                                        ARTICLE  17 : MESURES ET ACTES JURIDIQUES PARTICULIERS. 
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" style="width: 50%; font-size: 16px; font-weight: normal; line-height: 15px;">
                                                    <span style="display: block; font-size: 12px; padding: 0; font-weight: 400; text-align: justify;">
                                                        Le BENEFICIAIRE s'engage ?? informer la BANQUE au moins un mois ?? l'avance, par lettre recommand??e ou lettre contre d??charge, sur son intention de modifier la consistance de tout bien affect?? en garantie (mise en location, cession, ??change, emphyt??ose, ???etc.). 
                                                        <br/><br/>
                                                        La BANQUE peut faire opposition ?? la r??alisation des mesures et actes juridiques cit??s ci-dessus dans le d??lai d'un mois ?? compter de la r??ception de la communication. L'opposition doit ??tre motiv??e. Au cas o?? le BENEFICIAIRE mettrait ?? ex??cution lesdites mesures et actes juridiques malgr?? l'opposition de la BANQUE, l'article 12 de la pr??sente Convention sera applicable.
                                                        
                                                    </span>
                                                </td>
                                            </tr>


                                              <tr>
                                                <td colspan="2" style="width: 50%; font-size: 16px; font-weight: normal; line-height: 19px;">
                                                    <span class="heading_c" style="display: block; font-size: 13px; font-weight: 600;">
                                                       ARTICLE 18 : INFORMATION - DROIT DE REGARD.
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" style="width: 50%; font-size: 16px; font-weight: normal; line-height: 15px;">
                                                    <span style="display: block; font-size: 12px; padding: 0; font-weight: 400; text-align: justify;">
                                                       La BANQUE est autoris??e ?? v??rifier ?? tout moment dans les locaux du BENEFICIAIRE, l'utilisation conforme des facilit??s accord??es, de m??me qu'?? s'informer sur la situation financi??re du BENEFICIAIRE par un contr??le de la tenue des livres et autres documents du BENEFICIAIRE. Les frais de ces v??rifications sont ?? la charge du BENEFICIAIRE. 
                                                       
                                                    </span>
                                                </td>
                                            </tr>



                                              <tr>
                                                <td colspan="2" style="width: 50%; font-size: 16px; font-weight: normal; line-height: 19px;">
                                                    <span class="heading_c" style="display: block; font-size: 13px; font-weight: 600;">
                                                       ARTICLE  19: ENGAGEMENT DE NE PAS FAIRE CERTAINES OPERATIONS
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" style="width: 50%; font-size: 16px; font-weight: normal; line-height: 15px;">
                                                    <span style="display: block; font-size: 12px; padding: 0; font-weight: 400; text-align: justify;">
                                                       Tant que le BENEFICIAIRE sera d??biteur en vertu des pr??sentes ou susceptible de l?????tre, le BENEFICIAIRE, et devra maintenir les biens affect??s en garantie sans d??possession en bon ??tat ;  
                                                       
                                                        <br/><br/>
                                                        Pendant cette p??riode, il ne pourra, ?? moins d???accord pr??alable et ??crit de la BANQUE :
                                                        <ul>
                                                            <li>-   rien faire qui puisse en diminuer la valeur, ali??ner, ??tablir, au profit d???un tiers, un privil??ge supplantant le droit de s??ret?? de la Banque sur les garanties constitu??es. </li>
                                                            <li>-   Ni Contracter de nouveaux emprunts qui aggraveraient son endettement, ?? moins d???y ??tre express??ment autoris?? par la Banque, ou d???affecter les fonds emprunt??s au remboursement total ou partiel de sa dette dans les livres de la Banque</li>
                                                        </ul>
                                                        
                                                    </span>
                                                </td>
                                            </tr>


                                              <tr>
                                                <td colspan="2" style="width: 50%; font-size: 16px; font-weight: normal; line-height: 19px;">
                                                    <span class="heading_c" style="display: block; font-size: 13px; font-weight: 600;">
                                                       ARTICLE 20 : SUSPENSION ??? REFUS DE PAIEMENT ??? RESILIATION
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" style="width: 50%; font-size: 16px; font-weight: normal; line-height: 15px;">
                                                    <span style="display: block; font-size: 12px; padding: 0; font-weight: 400; text-align: justify;">
                                                        La BANQUE est autoris??e ?? refuser, suspendre sans pr??avis, exiger le remboursement imm??diat des avances consenties avec int??r??ts et cr??ances accessoires si :
                                                        
                                                        <ol type="a">
                                                            <li>les commissions, les int??r??ts ou les remboursements exigibles ne sont pas int??gralement parvenus ?? la BANQUE au moment de leur ??ch??ance ; </li>
                                                            <li>les montants des facilit??s ont ??t?? utilis??s contrairement aux dispositions pr??vues aux termes de la pr??sente convention ; </li>
                                                            <li>le BENEFICIAIRE a viol?? d'autres obligations de la pr??sente convention; </li>
                                                            <li>le BENEFICIAIRE est vis-??-vis de la BANQUE en retard dans l'ex??cution d'engagements financiers d??coulant d'autres conventions et contrats conclus entre lui et la BANQUE ;  </li>
                                                            <li>des mesures de poursuites sur les biens du BENEFICIAIRE ont lieu ou d'autres circonstances sont survenues qui, de l'avis de la BANQUE excluent ou mettent consid??rablement en danger la r??alisation du projet ou l'accomplissement des engagements pris par le BENEFICIAIRE dans la pr??sente convention ; </li>
                                                        </ol>
                                                        
                                                    </span>
                                                </td>
                                            </tr>
                                            
                                           </tbody>
                                    </table>
                                </td>
                                <td style="vertical-align: top; width: 50%; padding: 0; padding-left: 10px;">
                                    <table style="width: 100%; padding: 0; border-collapse: collapse; margin: 0; border-spacing: 0px;">
                                        <tbody style="padding: 0;">
                                            <tr>
                                                <td colspan="2" style="height: 30px; width: 100%;"></td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" style="width: 50%; font-size: 16px; font-weight: normal; line-height: 15px;">
                                                    <span style="display: block; font-size: 12px; padding: 0; font-weight: 400; text-align: justify;">
                                                       BENEFICIAIRE ou de la Banque, pour des raisons  de commodit??  des op??rations du BENEFICIAIRE .
                                                       <br/><br/>
                                                       En cas de non paiement d'effets tir??s sur le BENEFICIAIRE ?? leurs ??ch??ances, la BANQUE pourra toujours ?? sa convenance, et ?? toute ??poque contre-passer le montant des effets impay??s, qu'elle ait ou non ?? exercer des recours cambiaires contre les cooblig??s. La contre-passation du montant d'un effet laissera subsister le droit de propri??t?? de la BANQUE sur ledit effet.
                                                       <br/><br/>
                                                       La BANQUE adresse mensuellement au client un relev?? de son compte. Toute contestation ou r??clamation qui ne seraient pas parvenues ?? la BANQUE TRENTE (30) jours apr??s l'??dition du relev?? sera r??put??e non ??crite et ne pourra ??tre valablement adress??e ni oppos??e ?? la BANQUE. Le BENEFICIAIRE ??tant r??put?? avoir accept?? le contenu de son relev?? de compte.  
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" style="height: 10px; width: 100%;"></td>
                                            </tr>
                                             <tr>
                                                <td colspan="2" style="width: 50%; font-size: 16px; font-weight: normal; line-height: 19px;">
                                                    <span class="heading_c" style="display: block; font-size: 13px; font-weight: 600;">
                                                     ARTICLE 2 : DES FACILITES CONSENTIES EN COMPTE COURANT
                                                    </span>
                                                </td>
                                            </tr>
                                            
                                            <tr>
                                                <td colspan="2" style="width: 50%; font-size: 16px; font-weight: normal; line-height: 15px;">
                                                    <span style="display: block; font-size: 12px; padding: 0; font-weight: 400; text-align: justify;">
                                                       Dans le cadre de la pr??sente convention de compte courant, et suivant sa demande, la BANQUE s???engage ?? accorder au BENEFICIAIRE qui accepte, et d??s constitution des garanties, la facilit?? aux caract??ristiques ci-apr??s ;

                                                       <table style="border:1px solid #000">
                                                        <tr>
                                                            <td>Nature de la Facilit?? :</td>
                                                            <td></td>
                                                        </tr>
                                                         <tr>
                                                            <td>Montant :</td>
                                                            <td></td>
                                                        </tr>
                                                         <tr>
                                                            <td>Objet :</td>
                                                            <td></td>
                                                        </tr>
                                                         <tr>
                                                            <td>Ech??ance:</td>
                                                            <td></td>
                                                        </tr>
                                                         <tr>
                                                            <td>Taux d???int??r??t annuel :</td>
                                                            <td></td>
                                                        </tr>
                                                         <tr>
                                                            <td>D??roulement de la transaction:</td>
                                                            <td></td>
                                                        </tr>
                                                         <tr>
                                                            <td>Modalit??s d???utilisation:</td>
                                                            <td></td>
                                                        </tr>
                                                         <tr>
                                                            <td>Frais de dossier et de mise en place:</td>
                                                            <td></td>
                                                        </tr>
                                                         <tr>
                                                            <td>Prime d???assurance D??c??s B??n??ficiaire</td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Fonds de garantie :</td>
                                                            <td></td>
                                                        </tr>
                                                       </table>
                                                      Le B??n??ficiaire reconna??t que dans le cadre de son offre de cr??dit, la Banque a pris grand soin de lui communiquer pr??alablement les informations compl??tes sur le co??t, les crit??res d?????ligibilit??, les conditions et modalit??s de financement, afin de lui permettre de d??terminer si le cr??dit propos?? est adapt?? ?? ses besoins et ?? sa situation financi??re
                                                    </span>
                                                </td>
                                            </tr>
                                             <tr>
                                                <td colspan="2" style="height: 0; width: 100%;"></td>
                                            </tr>
                                             <tr>
                                                <td colspan="2" style="width: 50%; font-size: 16px; font-weight: normal; line-height: 19px;">
                                                    <span class="heading_c" style="display: block; font-size: 13px; font-weight: 600;">
                                                     ARTICLE 3 : INTERETS, FRAIS ET COMMISSIONS
                                                    </span>
                                                </td>
                                            </tr>
                                             <tr>
                                                <td colspan="2" style="width: 50%; font-size: 16px; font-weight: normal; line-height: 15px;">
                                                    <span style="display: block; font-size: 12px; padding: 0; font-weight: 400;"> 
                                                   Jusqu????? la cl??ture du compte, les int??r??ts et commissions dus ?? la Banque y seront port??s et deviendront des articles. 
                                                   <br/><br/>
                                                   L'utilisation effective des lignes des facilit??s consenties donnera lieu ?? la perception des int??r??ts calcul??s prorata temporis au taux annuel sp??cifi?? ?? l'article 2 ci-dessus, major??s de la taxe sur la valeur ajout??e exigible.
                                                   <br/><br/>
                                                   Les conditions relatives aux int??r??ts, frais et commissions seront celles fix??es selon les usages bancaires, conform??ment ?? tout Arr??t?? du Ministre des Finances de la REPUBLIQUE DU CAMEROUN, ou tout autre texte l??gislatif ou r??glementaire qui en tiendrait lieu.
                                                   <br/><br/>
                                                   Conform??ment ?? l???article 1.154 du Code Civil, en cas de non-paiement d???une ou plusieurs ??ch??ances d???int??r??ts, les int??r??ts ??chus et impay??s en produiront eux-m??mes de plein droit.
                                                   <br/><br/>
                                                   Toutes les avances que la BANQUE pourra ??tre amen??e ?? faire ?? l???occasion du pr??sent acte et de ses suites, notamment tous frais de conservation de sa cr??ance, tous imp??ts, droits et taxes quelconques, primes d???assurance, frais de gage que la BANQUE payerait en lieu et place du BENEFICIAIRE, notamment par suite de solidarit?? l??gale, seront remboursables sans d??lai et seront productifs d???int??r??ts au taux ci-dessus pr??vu, ?? compter du jour o?? elles auront ??t?? faites ; ces int??r??ts seront exigibles ?? tout moment, ainsi que la Taxe sur la Valeur Ajout??e ou tous imp??ts dont ils pourraient devenir passibles.

                                                   <ul>
                                                    <li>-   maintien du compte par le BENEFICIAIRE sans mouvement cr??diteur pendant une dur??e sup??rieure ou ??gale ?? quatre-vingt-dix (90) jours calendaires.</li>
                                                   </ul>

                                                   En cas d???admission du BENEFICIAIRE ?? toute proc??dure collective, comme en cas de cessation d???activit?? ou de cession de l???Entreprise, la cl??ture du compte interviendra de plein droit, sans pr??avis
                                                   <br/><br/>
                                                   Le solde du compte sera exigible d??s le jour de sa cl??ture. 
                                                    <br/><br/>
                                                    Les parties au compte pourront approuver les relev??s du compte existant entre elles, en fixer la position, en porter le solde dans leurs ??critures, sans que ces op??rations produisent les effets juridiques d???une cl??ture du compte et rendent le solde exigible si l???intention de cl??turer le compte n???a pas ??t?? nettement manifest??e. 
                                                    <br/><br/>
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" style="height: 0; width: 100%;"></td>
                                            </tr>
                                             <tr>
                                                <td colspan="2" style="width: 50%; font-size: 16px; font-weight: normal; line-height: 19px;">
                                                    <span class="heading_c" style="display: block; font-size: 13px; font-weight: 600;">
                                                      ARTICLE 8 : COMPTABILISATION DES CREANCES EN DIFFICULTE
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" style="width: 50%; font-size: 16px; font-weight: normal; line-height: 15px;">
                                                    <span style="display: block; font-size: 12px; padding: 0; font-weight: 400;"> 
                                                    Le BENEFICIAIRE reconna??t que les facilit??s stipul??es ?? l'article 2 ci-dessus lui sont accord??es en consid??ration de sa situation ??conomique, et s???engage ?? tout entreprendre pour pr??server  sa capacit?? de remboursement, et honorer les ??ch??ances des facilit??s ?? bonne date.
                                                    <br/><br/> 
                                                    En cas de d??gradation de la situation ??conomique du BENEFICIAIRE, comme en cas d???inex??cution des obligations de remboursement qui lui incombent en vertu du pr??sent acte, les cr??ances de la Banque seront, suivant leur ??tat, et ce conform??ment aux prescriptions du R??glement COBAC R-2018/01 relatif ?? la classification, ?? la comptabilisation et au provisionnement des cr??ances des ??tablissements de cr??dit, identifi??es en ?? cr??ances sensibles ??, en ?? Cr??ances Immobilis??es ??, en ?? Cr??ances Impay??es ?? ou en ?? Cr??ances Douteuses ??. 
                                                    <br/><br/> 
                                                   La classification en cr??ances douteuses d'une fraction des concours port??s par le BENEFICIAIRE entra??ne, par effet de contagion, le transfert de l'Int??gralit?? des cr??ances d??tenues sur lui en encours douteux, nonobstant toute consid??ration li??e aux garanties ??ventuellement d??tenues.<br/><br/> 
                                                    Les cr??ances sensibles, les cr??ances en souffrance et les cr??ances irr??couvrables seront comptabilis??es conform??ment aux principes aux prescriptions du R??glement COBAC R-2018/01 relatif ?? la classification, ?? la comptabilisation et au provisionnement des cr??ances des ??tablissements de cr??dit. 
                                                    <br/> <br/> 
                                                   L'identification en cr??ances immobilis??es, cr??ances impay??es et cr??ances douteuses n???emporte pas novation. Cette identification est abandonn??e lorsque les paiements reprennent de mani??re r??guli??re pour les montants correspondant aux ??ch??ances et si les arri??r??s sont apur??s.

                                                    </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" style="height: 10px; width: 100%;"></td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" style="width: 50%; font-size: 16px; font-weight: normal; line-height: 19px;">
                                                    <span class="heading_c" style="display: block; font-size: 13px; font-weight: 600;">
                                                  ARTICLE 9 : PREUVE DES OPERATIONS DU COMPTE 
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" style="width: 50%; font-size: 16px; font-weight: normal; line-height: 15px;">
                                                    <span style="display: block; font-size: 12px; padding: 0; font-weight: 400;">
                                                      Le montant du solde exigible et, d???une mani??re g??n??rale, toutes les op??rations du compte courant pourront ??tre ??tablies, m??me vis-??-vis des tiers, par les livres de comptes, registres, et relev??s de compte certifi??s conformes par le repr??sentant de la BANQUE, appuy??s le cas ??ch??ant de toutes factures ou re??us  ; Lesdits documents comptables vaudront titre contre le BENEFICIAIRE et les tiers.

                                                      <br/><br/>
                                                      A contrario, les ??changes de correspondance et autres documents, m??me ??mis par la Banque, ne feront foi de leur contenu que pour autant qu???ils seront fid??les aux livres de comptes, registres et relev??s de la comptabilit?? bancaire ;

                                                      <br/><br/>
                                                      La preuve des op??rations et des engagements des Parties sera suffisamment ??tablie par la r??conciliation conjointe et simultan??e:
                                                      <ul>
                                                        <li>-   du relev?? des op??rations du compte courant et des compte-ch??ques rattach??s, m??me ouverts sous un autre nom par le B??n??ficiaire;</li>
                                                        <li>-   du relev?? des op??rations enregistr??es dans les sous-comptes rattach??s au compte courant et aux compte-ch??ques du B??n??ficiaire, notamment :</li>
                                                        <li>-   du relev?? des op??rations enregistr??es dans les comptes mat??rialisant des facilit??s mobilis??es par la Banque au profit du BENEFICIAIRE, tant sous forme de tr??sorerie que par signature ;</li>
                                                        <li>-   du relev?? des op??rations enregistr??es dans les comptes cr????s, en ex??cution du R??glement COBAC R-2018/01 relatif ?? la classification, ?? la comptabilisation et au provisionnement des cr??ances des ??tablissements de cr??dit, pour la classification et la comptabilisation des cr??ances devenues ?? sensibles ??, ?? immobilis??es ??, ?? impay??es ?? ou ?? douteuses ??, de m??me que les int??r??ts, commissions et taxes enregistr??es sur lesdites cr??ances.</li>
                                                    </ul>
                                                    Le BENEFICIAIRE s???engage ?? : 
                                                    <ul>
                                                        <li>-   Suivre personnellement ou ?? faire suivre par ses mandataires les op??rations pass??es dans son compte ; </li>
                                                        <li>-   V??rifier l'exactitude des op??rations retrac??es par les relev??s de compte et autres justificatifs des transactions  bancaires (bordereaux de versement, factures de carte bancaire, re??us et autres documents) ; </li>
                                                        <li>-   Conserver lesdits justificatifs  aux fins de droit,  et en tout ??tat de cause.</li>
                                                       
                                                      </ul>

                                                      Le cas ??ch??ant, toute r??clamation ??ventuelle pourra ??tre form??e par le BENEFICIAIRE ou son mandataire, par ??crit, au plus tard quatre-vingt-dix (90) jours apr??s la comptabilisation de l???op??ration contest??e.
                                                      <br/><br/>
                                                      Les parties conviennent en cons??quence qu????? d??faut de contestation ??crite par le client quatre-vingt-dix (90) jours apr??s la comptabilisation d???une op??ration, celle-ci sera En cas de cl??ture du compte courant, quelque que soit la cause, la BANQUE aura la facult?? de contrepasser imm??diatement au d??bit de ce compte, les effets impay??s au jour de la cl??ture, ??chus ou non ??chus, de m??me que tous engagements de quelque nature qu???ils soient, directs ou indirects, pr??sents  ou futurs,  actuels  ou ??ventuels  que le  BENEFICIAIRE pourra avoir envers la BANQUE dans quelque Agence que ce soit. La BANQUE conservera cependant l???int??gralit?? de ses recours contre les ??ventuels cooblig??s et cautions qu???elle exercera d??s lors en qualit?? de cr??anci??re gagiste, pour remboursement du solde d??biteur du compte courant cl??tur??.
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" style="height: 10px; width: 100%;"></td>
                                            </tr>
                                           <tr>
                                                <td colspan="2" style="width: 50%; font-size: 16px; font-weight: normal; line-height: 19px;">
                                                    <span class="heading_c" style="display: block; font-size: 13px; font-weight: 600;">
                                                    ARTICLE 13 : DOCUMENTATION ET GARANTIES
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" style="width: 50%; font-size: 16px; font-weight: normal; line-height: 15px;">
                                                    <span style="display: block; font-size: 12px; padding: 0; font-weight: 400; text-align: justify;">
                                                       En application des dispositions des articles 106 et suivants de l???Acte Uniforme portant organisation des s??ret??s, la BANQUE d??tient des privil??ges g??n??raux sur les biens meubles et immeubles du BENEFICIAIRE.<br/><br/>
                                                        Le BENEFICIAIRE s???engage ?? fournir, pr??alablement ?? la mise en place des facilit??s, la documentation et les garanties ci-apr??s :<br/><br/>
                                                        Les documents de s??ret?? fournis garantiront le d??nouement des facilit??s octroy??es par la pr??sente convention, ainsi que le solde du compte courant, tel qu???il appara??tra lors de la cl??ture : <br/><br/>
                                                        Aucune clause de la pr??sente convention n???interdit, n???emp??che, ne restreint, ne limite ou ne g??ne la mise en ??uvre, par la BANQUE, en cas de non paiement des sommes dues par le BENEFICIAIRE, de droits, actions, gages, hypoth??ques, cautionnements, avals, nantissements et s??ret??s de toute nature auxquels se trouveraient assortis les engagements pris par l???emprunteur dans le cadre de la pr??sente convention.<br/><br/>
                                                        Le BENEFICIAIRE s???engage, en tant que de besoin, ?? fournir ?? la BANQUE, par acte s??par??, ?? annexer ?? la pr??sente convention, toute s??ret?? personnelle ou r??elle n??cessaire ?? la s??curisation du remboursement des facilit??s et du solde ??ventuellement d??biteur du compte courant tel qu???il pourrait appara??tre ?? sa cl??ture.
                                                        <br/><br/>
                                                        La BANQUE aura, sans pr??judice de tous ses autres droits et recours, la facult?? de, ?? tout moment, sans avoir ?? en aviser le BENEFICIAIRE au pr??alable, op??rer compensation entre tout montant d?? par le BENEFICIAIRE, au titre de la pr??sente convention, et tout montant que la BANQUE d??tiendrait pour le compte du BENEFICIAIRE, en toute monnaie, et en tout lieu, dans ses livres, ?? quelque titre que ce soit. 
                                                        <br/><br/>
                                                        En aucun cas, le BENEFICIAIRE ne pourra opposer ?? la BANQUE, dans le cadre de la pr??sente convention, des r??clamations ou des exceptions quelles qu???elles soient, tir??es de toute autre convention le liant avec elle.

                                                    </span>
                                                </td>
                                            </tr>

                                             <tr>
                                                <td colspan="2" style="height: 10px; width: 100%;"></td>
                                            </tr>
                                           <tr>
                                                <td colspan="2" style="width: 50%; font-size: 16px; font-weight: normal; line-height: 19px;">
                                                    <span class="heading_c" style="display: block; font-size: 13px; font-weight: 600;">
                                                   ARTICLE  15 : PENALITES, INDEMNITES ET FRAIS.  
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" style="width: 50%; font-size: 16px; font-weight: normal; line-height: 15px;">
                                                    <span style="display: block; font-size: 12px; padding: 0; font-weight: 400; text-align: justify;">
                                                       15.1 ??? Teneur des engagements du B??n??ficiaire : La pr??sente convention de Compte Courant fait na??tre, ?? la charge du B??n??ficiaire et de ses cooblig??s, l???obligation de satisfaire aux conditions stipul??es aux articles 5 et 13 supra et de rembourser ?? bonne date l???int??gralit?? des avances de tr??sorerie consenties par la Banque, tant en principal qu???en int??r??ts, taxes, frais et accessoires.<br/><br/>
                                                        15.2 ??? Clause p??nale : A d??faut de remboursement des facilit??s ?? bonne date, le BENEFICIAIRE se verra imputer, sur l???encours restant des engagements non rembours??s, des p??nalit??s calcul??es au taux de dix pourcent (10%) des sommes restant dues ; Il en ira de m??me ?? la cl??ture du compte courant, si les engagements exigibles demeures non rembours??s sous quinzaine.
                                                        <br/><br/>
                                                        15.3 ??? Frais d???externalisation : En cas de d??classement des engagements, la Banque aura la facult?? d???externaliser le recouvrement aupr??s des Cabinets Sp??cialis??s de Recouvrement. Dans ce cas, le BENEFICIAIRE se verra imputer des indemnit??s de recouvrement externalis?? repr??sentant Vingt Pourcent (20%) des sommes restant dues ;
                                                        <br/><br/>
                                                        15.4 ??? Frais et honoraires de recouvrement : Dans le cas o?? pour parvenir au recouvrement de la cr??ance r??sultant du pr??sent acte, la Banque se retrouverait oblig?? d???avoir recours ?? un mandataire de justice (d??tectives, Huissiers, Avocats, experts) ou d???exercer des poursuites, l???emprunteur s???oblige ?? assumer les frais de justice, ??moluments, honoraires, frais de proc??dure et d??pens mis ?? sa charge, et en outre, payera ?? la Banque une indemnit?? forfaitaire repr??sentant deux pour cent (2%) des sommes exigibles pour  couvrir les pertes d???int??r??ts, de frais et de dommages de toutes sortes occasionn??s par la n??cessit?? du recours ou des poursuites. 
                                                        <br/><br/>
                                                        15.5 ??? D??s ?? pr??sent, le BENEFICIAIRE s???oblige dans les termes ci-dessus, et donne d???ores et d??j?? l???ordre irr??vocable ?? la BANQUE de d??biter son compte le cas ??ch??ant.


                                                    </span>
                                                </td>
                                            </tr>

                                             <tr>
                                                <td colspan="2" style="height: 10px; width: 100%;"></td>
                                            </tr>
                                           <tr>
                                                <td colspan="2" style="width: 50%; font-size: 16px; font-weight: normal; line-height: 19px;">
                                                    <span class="heading_c" style="display: block; font-size: 13px; font-weight: 600;">
                                                  Article 16 : RISQUES D'INTERDICTION ET DE POURSUITE PENALE
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" style="width: 50%; font-size: 16px; font-weight: normal; line-height: 15px;">
                                                    <span style="display: block; font-size: 12px; padding: 0; font-weight: 400; text-align: justify;">
                                                       16.1 ??? Le non-remboursement des facilit??s accord??es en vertu de la pr??sente convention constitue, au m??me titre que le non-respect d???un moratoire, un Incident de Cr??dit au sens de la loi N??2019/021 du 24 d??cembre 2019 fixant certaines r??gles relatives ?? l???activit?? de cr??dit dans les secteurs bancaires et de la Microfinance au Cameroun ;<br/><br/>
                                                       <ul>
                                                           <li>f)   le compte du BENEFICIAIRE ouvert dans les livres de la BANQUE reste sans mouvement cr??diteur de sa part pendant trente (30) jours calendaires. </li>
                                                       </ul>
                                                        Toutefois, la BANQUE ne pourra exercer ses droits pr??vus aux alin??as (a) ?? (d) du pr??sent article que si le BENEFICIAIRE ne r??pond pas ?? la sommation de paiement ou de cessation d'une violation de la convention et/ou d'en ??carter les suites dans un d??lai de 30 jours ?? compter de l'envoi de cette sommation par lettre contre d??charge ou lettre recommand??e avec accus?? de r??ception, par t??lex ou t??l??fax.
                                                       
                                                    </span>
                                                </td>
                                            </tr>

                                             <tr>
                                                <td colspan="2" style="height: 10px; width: 100%;"></td>
                                            </tr>
                                           <tr>
                                                <td colspan="2" style="width: 50%; font-size: 16px; font-weight: normal; line-height: 19px;">
                                                    <span class="heading_c" style="display: block; font-size: 13px; font-weight: 600;">
                                                   ARTICLE 21 : IMPOTS - TAXES - FRAIS. 
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" style="width: 50%; font-size: 16px; font-weight: normal; line-height: 15px;">
                                                    <span style="display: block; font-size: 12px; padding: 0; font-weight: 400; text-align: justify;">
                                                      Le BENEFICIAIRE prend ?? sa charge tous droits, imp??ts, taxes pr??sents et futurs, de quelque nature que ce soit en relation avec la convention de facilit??s ou son ex??cution, au Cameroun ou ?? l???ext??rieur, notamment ceux qui sont li??s ?? la constitution, ?? l'inscription et le cas ??ch??ant ?? la radiation des s??ret??s, au versement du pr??t et au virement ?? effectuer d'apr??s le pr??sent contrat.
                                                      <br/><br/>
                                                       Le BENEFICIAIRE autorise la BANQUE ?? d??biter son compte pour le r??glement de ces frais.
                                                        <br/><br/>
                                                       Tous les versements ?? effectuer par le BENEFICIAIRE au chiffre 2 du pr??sent article deviennent exigibles d??s que la BANQUE demande leur paiement au BENEFICIAIRE.
                                                        
                                                    </span>
                                                </td>
                                            </tr>


                                             <tr>
                                                <td colspan="2" style="height: 10px; width: 100%;"></td>
                                            </tr>
                                           <tr>
                                                <td colspan="2" style="width: 50%; font-size: 16px; font-weight: normal; line-height: 19px;">
                                                    <span class="heading_c" style="display: block; font-size: 13px; font-weight: 600;">
                                                  ARTICLE 22: DECLARATIONS.  
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" style="width: 50%; font-size: 16px; font-weight: normal; line-height: 15px;">
                                                    <span style="display: block; font-size: 12px; padding: 0; font-weight: 400; text-align: justify;">
                                                      Le BENEFICIAIRE d??clare ??s qualit?? :

                                                      <ul>
                                                          
                                                        <li>-   Que toutes les informations fournies dans le cadre de la pr??sente convention sont exactes ;</li>
                                                        <li>-   Que les garanties conc??d??es en s??curisation du remboursement des facilit??s objet de la pr??sente, serviront ??galement ?? la couverture du solde des autres comptes ??ventuellement d??biteurs du BENEFICIAIRE, ou d???autres concours que la Banque pourrait ??tre amen??e ?? lui conc??der. </li>
                                                        <li>-   Qu???il jouit de la pleine capacit?? requise pour contracter dans le cadre du pr??sent acte et consentir toute s??ret??.</li>
                                                      
                                                      </ul>
                                                    </span>
                                                </td>
                                            </tr>


                                             <tr>
                                                <td colspan="2" style="height: 10px; width: 100%;"></td>
                                            </tr>
                                           <tr>
                                                <td colspan="2" style="width: 50%; font-size: 16px; font-weight: normal; line-height: 19px;">
                                                    <span class="heading_c" style="display: block; font-size: 13px; font-weight: 600;">
                                                   ARTICLE 23 : CLAUSES FINALES.  
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" style="width: 50%; font-size: 16px; font-weight: normal; line-height: 15px;">
                                                    <span style="display: block; font-size: 12px; padding: 0; font-weight: 400; text-align: justify;">
                                                       Les droits du BENEFICIAIRE r??sultant de la pr??sente convention ne peuvent ??tre ni c??d??s ni grev??s. Ils engagent cependant ses ayants droit. 
                                                       <br/><br/>
                                                        Les modifications et avenants ?? la pr??sente convention doivent ??tre faits par ??crit.
                                                        <br/><br/>
                                                       L'invalidation d'une clause de la pr??sente convention n'entache pas la validit?? des autres dispositions. Les clauses invalides seront aussit??t remplac??es par les parties contractantes par des dispositions conformes ?? la l??gislation et aux usages en vigueur. A d??faut, les dispositions du droit positif pr??vaudront, suppl????es le cas ??ch??ant par les principes g??n??raux du droit applicables. Si subsiste un vide juridique, les dispositions suppl??tives seront
                                                        <br/><br/>
                                                       Le fait pour la BANQUE de ne pas user, d'un droit dont elle jouit en vertu du pr??sent contrat n'emporte pas renonciation ?? ce droit. 
                                                        <br/><br/>
                                                       Le pr??sent contrat est soumis au droit camerounais. Il entrera en vigueur d??s sa signature et engagera les parties jusqu'?? plein accomplissement de la totalit?? des obligations de paiement au b??n??fice de la BANQUE.
                                                       <br/><br/>
                                                        Pour l???ex??cution des pr??sentes et de leurs suites, les Parties font ??lection de domicile en leur si??ge social respectif ci-dessus indiqu??.

                                                    </span>
                                                </td>
                                            </tr>


                                             <tr>
                                                <td colspan="2" style="height: 10px; width: 100%;"></td>
                                            </tr>
                                           <tr>
                                                <td colspan="2" style="width: 50%; font-size: 16px; font-weight: normal; line-height: 19px;">
                                                    <span class="heading_c" style="display: block; font-size: 13px; font-weight: 600;">
                                                 <?php echo strtoupper("ARTICLE 24 : R??glement de diff??rends"); ?>
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" style="width: 50%; font-size: 16px; font-weight: normal; line-height: 15px;">
                                                    <span style="display: block; font-size: 12px; padding: 0; font-weight: 400; text-align: justify;">
                                                       En cas de diff??rend entre les Parties ayant trait ?? la validit??, l???interpr??tation, l???ex??cution ou l???inex??cution du pr??sent contrat, les Parties s???obligent ?? se concerter et ?? rechercher un r??glement amiable dans un d??lai de trente (30) jours suivant la notification par une Partie au litige ?? l???autre Partie, de l???objet du diff??rend n??, ou susceptible de na??tre. Ce d??lai peut ??tre prorog?? d???une dur??e ??gale d???accord Parties.<br/><br/>
                                                       Tout diff??rend qui n???aurait pas ??t?? r??gl?? ?? l???amiable dans les d??lais ci-dessus pr??vus, sera soumis ?? la juridiction comp??tente dans le ressort de laquelle est situ?? le si??ge social ou le domicile du d??fendeur.
                                                       
                                                    </span>
                                                </td>
                                            </tr>


                                             <tr>
                                                <td colspan="2" style="height: 10px; width: 100%;"></td>
                                            </tr>
                                           <tr>
                                                <td colspan="2" style="width: 50%; font-size: 16px; font-weight: normal; line-height: 19px;">
                                                    <span class="heading_c" style="display: block; font-size: 13px; font-weight: 600;">
                                                  ARTICLE 25 : LOI APPLICABLE 
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" style="width: 50%; font-size: 16px; font-weight: normal; line-height: 15px;">
                                                    <span style="display: block; font-size: 12px; padding: 0; font-weight: 400; text-align: justify;">
                                                      Le pr??sent contrat est r??gi exclusivement par le droit camerounais.<br/><br/>
                                                       
                                                    </span>
                                                </td>
                                            </tr>

                                            
                                            <tr>
                                                <td colspan="2" style="height: 50px; width: 100%;"></td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" style="width: 50%; font-size: 16px; font-weight: normal; line-height: 15px;">
                                                    <span style="display: block; font-size: 12px; padding: 0; font-weight: 400;">
                                                        Fait ?? ----------------------------------------------, le -------------------------
                                                    </span>
                                                </td>
                                            </tr>
                                            
                                           
                                           
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td colspan="2"><hr/></td>
            </tr>
            <tr>
                <td colspan="2" style="font-size:12px;"><span style="margin-left: 15%;margin-right: 35%;">Pour L???EMPRUNTEUR</span> <span style="margin-right: 15%"> Pour LA BANQUE</span></td>
               
                
            </tr>
        </tbody>
    </table>
     <button type="button" style="margin:10px 10px ;" onclick="window.print()">PRINT</button>
</body>

</html>
