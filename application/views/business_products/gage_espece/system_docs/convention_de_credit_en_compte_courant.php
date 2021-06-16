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

                                    <span style=" font-size: 12px;">Banque Atlantique Cameroun par abréviation «BACM », Société Anonyme avec Conseil d’Administration au capital social de Treize milliards de francs CFA  (13 000 000 000 FCFA ) dont le siège social est à Akwa, Douala , boite postale numéro 2933 Douala Cameroun, immatriculée au Registre du Commerce et du Crédit Mobilier de Douala – Bonanjo le 19 juin 2008 sous le numéro RC/DLA/2008/B/1195, avec inscription modificative le 16 septembre 2015 sous le numéro RC/DLA/2015/M/4385 ; </span> 
                                    <br/>
                                    <span style="float:right;font-style: italic;font-size: 12px;">Ci- dénommée "LA BANQUE" d’une part ;</span>
                                </div>

                                <span style="font-size: 12px;font-weight: 600">ET</span>
                                    <div style="border:1px solid #000;margin:8px 0px;padding:5px" >

                                    <span style=" font-size: 12px;">M/Mme __<?php echo ucfirst($pinfo[0]['last_name']) ?: ' ';?>_<?php echo ucfirst($pinfo[0]['middle_name']) ?: '';?>_<?php echo ucfirst($pinfo[0]['first_name']) ?: ' ';?>__
            Né le___<?php echo date("d-m-Y", strtotime($pinfo[0]["dob"]));?>__ à __<?php echo $pinfo[0]['place_of_birth']?>__ de ___<?php echo $adinfo[0]['father_fullname']?>__ et de ___<?php echo $adinfo[0]['mother_fullname']?>___
            Demeurant à ___<?php echo $adrs[0]['city_id'] ?>___ ; Contact téléphonique : ___<?php echo $adinfo[0]['main_phone'] ?>___ Fonction : __<?php echo strtoupper($adinfo[0]['occupation']) ?: '-';?>__ Employeur : ____<?php echo strtoupper($empinfo[0]['employer_name']) ?: '_';?>___ BP : ___<?php echo $adrs[0]['resides_address'] ?: '-';?> <?php echo $adrs[0]['Nom de la rue'] ?: '-';?>_ ,<?php echo $adrs[0]['city_id'] ?: '-';?>__ ; Matricule __<?php echo $pinfo[0]['registration_no']?>__ 
            Titre d’Identification : ___<?php echo  $adinfo[0]['type_id'];?>___ ; N° __<?php echo $adinfo[0]['id_number'] ?: '-';?>__  délivré(e) le _<?php if($adinfo[0]['room_type']) echo date('d-m-Y', strtotime($adinfo[0]['room_type']));?>__ à  ___<?php echo $adinfo[0]['place_of_establishment_typeid'] ?: '-';?>___</span>
    <br/>
        <span style="font-style: italic;float: right;font-size: 12px;">
        Ci-dénommé(e) ‘‘ l’EMPRUNTEUR’’ d’autre part ;
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
                                        La banque atlantique Cameroun a été sollicitée par le BENEFICIAIRE,  pour l’ouverture, en compte courant, d’une facilité sous forme de ______ plafonnée au montant de __________FCFA, destinée à ______________.La Banque s’y étant disposée, les Parties se sont rapprochées pour matérialiser leur accord dans les termes de la présente convention de compte courant, avec laquelle le présent préambule forme un tout indivisible : 
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
                                                       La BANQUE et le BENEFICIAIRE sont convenus, dès avant ce jour, de faire entrer dans un compte courant toutes les opérations qu’elles pourraient avoir à traiter ensemble. En conséquence, les remises effectuées en compte courant se traduisent et continueront à se traduire en simples articles de crédit et de débit, destinés à se balancer à la clôture du compte courant en un solde seul exigible.
                                                       <br/> <br/>
                                                       Le compte courant, en raison de son caractère de généralité, englobe et continuera d’englober tous les rapports d’obligations qui existent et existeront entre le BENEFICIAIRE et la BANQUE. Il en sera ainsi lors même que les opérations seraient comptabilisées dans des comptes différents même tenus dans des sièges différents, tous les comptes ouverts au BENEFICIAIRE par la BANQUE devant être considérés comme des chapitres du compte courant, à moins que les opérations portées à certains de ces comptes ne soient, par exception, exclues du compte courant.
                                                        <br/> <br/>
                                                       De même le compte courant comprendra, sauf l’exception ci-dessus prévue, les créances dont la cause serait antérieure à la clôture du compte, mais qui, encore éventuelles à cette date, ne naîtraient au profit de la BANQUE qu’après la clôture de celui-ci, telles notamment que les recours susceptibles d’être exercés par la BANQUE si elle s’était portée caution ou avaliste du BENEFICIAIRE avant la clôture du compte, ou encore la créance que la BANQUE pourrait être amenée à faire valoir à l’encontre du BENEFICIAIRE si ce dernier s’était porté caution ou avaliste envers la BANQUE avant la clôture du compte.  
                                                        <br/> <br/>
                                                       En conséquence du transfert de la propriété d’effets à son profit, résultant, soit de la création, soit de l’endossement de tels effets à son ordre, la BANQUE portera au crédit du compte le montant des effets ainsi remis; cette inscription aura lieu sous réserve d’encaissement. En cas de non-paiement d’effets à leur échéance, la BANQUE pourra toujours, à sa seule convenance et à toute époque, contre-passer le montant des effets impayés, qu’elle ait ou non à exercer des recours cambiaires contre les coobligés. La contre-passation du montant d’un effet laissera subsister le droit de propriété de la BANQUE sur ledit effet.
                                                        <br/> <br/>
                                                       Toutefois, la BANQUE annulera l’endos fait à son profit ou réendossera, sans garantie, au profit du BENEFICIAIRE, les effets dont le montant aura été contre-passé, si au moment de la contre-passation le compte comporte une provision suffisante pour couvrir le montant contre-passé. Dans cette hypothèse, les effets en cause seront restitués au BENEFICIAIRE.
                                                        <br/> <br/>
                                                        Le BENEFICIAIRE dispense la BANQUE de tous protêts et de tous avis de non-acceptation ou de non-paiement prévus par le Code de Commerce. La BANQUE conservera, nonobstant le défaut de protêts et d’avis, son recours contre le BENEFICIAIRE et son droit de contre-passer le montant des effets impayés.
                                                         <br/> <br/>
                                                        Les sûretés et privilèges affectés à la garantie du présent contrat de prêt continueront de garantir le solde exigible du compte courant du BENEFICIAIRE, même en cas de remboursement total du prêt et de toutes les traites dues ; 
                                                         <br/> <br/>
                                                        En tout état de cause et à tout moment, la BANQUE pourra exiger la production de garanties supplémentaires si elle juge insuffisantes celles décrites à l'article 9 du présent contrat. Les remises effectuées au titre du compte courant se traduisent et continueront de se traduire en simples articles de crédit et de débit destinés à se balancer à tout moment en un solde exigible. 
                                                         <br/> <br/>
                                                        Tous les comptes ouverts au BENEFICIAIRE, y compris les comptes de déclassement des créances, sont considérés comme des chapitres du compte courant du BENEFICIAIRE, et demeureront gouvernés par le principe d’unicité de compte. Feront notamment partie intégrante  de ce compte unique , tous comptes  tenus dans n’importe quel agence de la Banque au nom du BENEFICIAIRE, qu’ils soient ou non soumis  à des taux  ou conditions particulières, ouverts à des titres et pour des mobiles distincts  ou sous des numéros  différents, à l’initiative du A l’échéance de toute facilité, les intérêts courront sur l’encours des engagements impayés au taux de découvert standard de dix-sept pourcent (17%) hors taxes conformément aux conditions générales de banque. De même, à l’échéance finale des facilités, les intérêts courront sur l’encours des engagements impayés au taux de découvert standard de dix-sept pourcent (17%) à défaut de renouvellement ou de prorogation.
                                                         <br/> <br/>
                                                         Toute demande de prorogation sera formulée au plus tard un (01) mois avant l’échéance. En cas de prorogation de ligne, le taux d’intérêt conventionnel stipulé à l’alinéa 1er sera majoré de deux (02) points. En cas de prorogation d’effets, le taux d’escompte sera majoré d’un (01) point, sans préjudice de la perception des frais de prorogation conformément aux conditions générales de banque.
                                                         <br/> <br/>
                                                         Dès le lendemain de la clôture du compte courant, les intérêts courront sur le solde du compte et sur tous les accessoires au taux de découvert standard susvisé majoré de deux points jusqu’à parfait paiement. Ils seront exigibles à tout instant, et si, par suite de retard de paiement, ils sont dus pour une année entière, ils produiront eux-mêmes intérêts conformément à l’article 1154 du Code Civil. 
                                                         <br/> <br/>
                                                         Le Taux Effectif Global (TEG) applicable au Crédit s’établit à ____. Il exprime le coût réel du Crédit, intérêts et frais accessoires compris.
                                                          <br/> <br/>
                                                         Les parties reconnaissent que le Taux Effectif Global applicable au Crédit est consenti en deçà du Taux d’Usure, lequel s’établit à _____ à la date du présent acte. 
                                                             <br/> <br/>
                                                         Tous impôts ou taxes auxquels pourraient donner lieu les intérêts et commissions, seront à la charge du BENEFICIAIRE et suivront le sort desdits intérêts et commissions auxquels ils seront afférents.

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
                                                       Pendant la durée du compte courant, il sera porté toutes les avances que la BANQUE pourra être  amenée à faire à l’occasion du présent acte ou de ses suites, notamment tous impôts, droits et taxes quelconques que la BANQUE pourra être amenée à payer aux lieu et place du  BENEFICIAIRE, notamment par suite de solidarité légale.  <br /><br />
                                                       Après la clôture du compte courant, les avances qui pourront être faites constitueront des accessoires du solde du compte courant, créance principale. Dans cette hypothèse, elles seront remboursables sans délai et seront productives d’intérêts au taux majoré sus-indiqué à compter du jour où elles auront été faites.
                                                         <br /><br />
                                                         Ces intérêts seront exigibles à tout moment, ainsi que tous impôts ou taxes dont ils pourraient devenir passibles. 
                                                        
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
                                                        Tant que le BENEFICIAIRE sera susceptible d’être débiteur en vertu des présentes, il devra : </br><br/>
                                                        
                                                        <ul>
                                                            <li>-   Informer la BANQUE dans un délai de trentaine de tous faits susceptibles d’affecter sérieusement l’importance ou la valeur de son patrimoine ou d’augmenter sensiblement le volume de ses engagements ; </li>
                                                            <li>-   Tenir la BANQUE informée de toutes modifications et transformations affectant sa forme juridique et/ou capacité (notamment règlement amiable, cessation de paiement ou d’activités, etc.), ainsi que toutes autres situations de droit ou de fait susceptibles d’avoir les mêmes effets. </li>
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
                                                       
                                                       Si des avances sont consenties ou promises par la BANQUE, celle-ci pourra exiger que des effets soient tirés, souscrits ou acceptés à son ordre par le BENEFICIAIRE. 
                                                        <br/><br/>
                                                        Le transfert de la propriété de ces effets au profit de la BANQUE produira les conséquences prévues à l’article 1, dont les dispositions seront applicables à la suite de l’opération.
                                                       
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
                                                        Les concours objets des présentes sont consentis pour la durée prévue à l’article 2 ci-dessus. 
                                                        <br/><br/>
                                                        Le compte courant est convenu pour une durée indéterminée. Il pourra être clôturé à tout instant. La clôture interviendra à la date de l’émission de l’avis de clôture qui sera donné ou adressé à l’autre par celle des parties qui voudra mettre fin au compte, à moins que cette partie n’ait dans son avis, fixé la clôture du compte à une date ultérieure. 
                                                        <br/><br/>
                                                        Dès cet instant, pour le cas où le compte enregistrerait un découvert à durée indéterminée autre qu’occasionnel, la BANQUE s’engage à fixer la date de clôture du compte au moins trente (30) jours à partir de la date d’envoi d’une notification par lettre recommandée avec accusé de réception ou lettre contre décharge qui sera donnée ou adressée à l’autre par celle des parties qui voudra mettre fin au compte. 
                                                        <br/><br/>
                                                        Conformément aux dispositions légales, la BANQUE ne sera pas tenue de respecter ce délai de préavis en cas de : 
                                                        <ul>
                                                            <li>- comportement gravement répréhensible du BENEFICIAIRE ou de situation irrémédiablement compromise de celui-ci ;</li>
                                                            <li>-   concours accordé à titre occasionnel et exceptionnel au BENEFICIAIRE ;</li>
                                                        </ul>
                                                        considérée comme définitivement approuvée, et aucune contestation ne sera recevable devant les tribunaux. 
                                                        <br/><br/>
                                                        La Banque s’engage néanmoins à conserver en originaux ou sur support électronique pendant dix (10) ans au maximum, les extraits de compte et les pièces comptables relatives aux opérations initiées par le BENEFICIAIRE.
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
                                                       Lors de la clôture du compte, son solde ne sera établi que sous réserve de la liquidation des opérations en cours. 
                                                        <br/><br/>
                                                        A titre de liquidation des opérations en cours, la BANQUE aura notamment la faculté de: 
                                                        <ul>
                                                            <li>- contre-passer, après la clôture du compte le montant des effets impayés ; </li>
                                                            <li>-  porter au débit de ce compte les sommes qu’elle sera amenée à payer postérieurement à la clôture en exécution de ses engagements de caution, d’avaliste ou autres engagements pris en faveur du BENEFICIAIRE ; </li>
                                                            <li>-  et d’une manière générale, porter au débit du compte toutes les sommes susceptibles de lui être dues par le BENEFICIAIRE postérieurement à la clôture en vertu d’engagements quelconques du BENEFICIAIRE antérieurs à la clôture du compte.  </li>
                                                        </ul>
                                                        Le solde définitif du compte sera arrêté une fois cette liquidation effectuée et compte tenu de ses résultats.  
                                                        
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
                                                        1*) Les concours objet des présentes seront logés dans le compte courant numéro _________ .
                                                        <br/><br/>
                                                        2*) Le paiement des créances résultant au profit de la BANQUE de la clôture du compte aura lieu au Siège de la banque ou à toute autre agence de la banque. 
                                                       
                                                    </span>
                                                </td>
                                            </tr>



                                              <tr>
                                                <td colspan="2" style="width: 50%; font-size: 16px; font-weight: normal; line-height: 19px;">
                                                    <span class="heading_c" style="display: block; font-size: 13px; font-weight: 600;">
                                                       ARTICLA 12 :    DECHEANCE DU TERME – EXIGIBILITE ANTICIPEE
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" style="width: 50%; font-size: 16px; font-weight: normal; line-height: 15px;">
                                                    <span style="display: block; font-size: 12px; padding: 0; font-weight: 400; text-align: justify;">
                                                        Le concours stipulé à l’article 2 ci-avant deviendra immédiatement exigible dans les cas suivants :
                                                        <ul>
                                                            <li>- A défaut d’inexécution d’un seul des engagements pris au présent acte par le BENEFICIAIRE, notamment sous l’article intitulé « Communication à faire à la BANQUE » ;</li>
                                                            <li>-   En cas d’inexactitude d’une seule des déclarations faites au présent acte, notamment au sujet de la situation globale de l’entreprise, à moins que les inconvénients pouvant résulter d’une situation non-conforme aient cessé d’exister ;</li>
                                                            <li>-   A défaut de paiement par le BENEFICIAIRE de ses contributions, taxes et prestations sociales et autres ;</li>
                                                            <li>-   En cas de fusion, dissolution, transfert de siège social du BENEFICIAIRE à une autre ville ;</li>
                                                            <li>-   En cas d’absorption, de liquidation, de redressement judiciaire, d’ouverture d’une procédure collective à l’encontre du BENEFICIAIRE ;</li>
                                                            <li>-   Au cas où le BENEFICIAIRE ne souscrirait pas à l a première demande de la BANQUE, un des billets dont la souscription éventuelle sera prévue ci-après ;</li>

                                                            <li>-   En cas de maintien par le BENEFICIAIRE de son compte courant sans mouvements créditeurs pendant une durée supérieure ou égale à quarante cinq (45) jours ;</li>
                                                            <li>-   En cas de déchéance de droit, de tout ou une partie des garanties convenues, à moins que le BENEFICIAIRE ait pourvu à leur remplacement ;</li>
                                                            <li>-   En cas de comportement gravement répréhensible ou de situation irrémédiablement compromise du BENEFICIAIRE ; </li>
                                                            <li>-   En cas de production ou d’usage de faux documents ;</li>
                                                            <li>-   En cas de disparition irrémédiable de la source de remboursement ;</li>
                                                            <li>-   Tout évènement de nature à affecter la qualité de la signature du BENEFICIAIRE, ou pouvant entraîner un risque pour la BANQUE de non recouvrement de sa créance.</li>
                                                        </ul>
                                                        Si une seule de ces hypothèses se réalisait, la BANQUE pourrait exiger le remboursement des fonds mobilisés dans le cadre du présent concours, du solde du compte courant ou ce qui resterait alors dû immédiatement et sans aucune formalité. Cependant, en ce qui concerne le cas prévu à l’alinéa 6 ci-dessus, l’exigibilité n’aurait lieu que quinze jours après l’envoi d’une lettre par voie d’huissier indiquant l’intention de la BANQUE de se prévaloir de la présente clause. Les paiements ou régularisations postérieurs ne feront pas obstacle à cette exigibilité. 
                                                        <br/><br/>
                                                       En cas d’usage de faux documents, le BENEFICIAIRE et ses coobligés s’exposent en vertu des dispositions de la loi N°2019/021 du 24 décembre 2019 fixant certaines règles relatives à l’activité de crédit dans les secteurs bancaires et de la Microfinance au Cameroun qui dispose : 
                                                        <br/><br/>
                                                        « Art.22 : Est punie d'un emprisonnement de six (06) mois à trois (03) ans et d'une amende de cent mille (100.000) à cinq millions (5.000.000) de francs CFA, ou de l'une de ces deux peines seulement, toute personne qui, avec l'intention de porter atteinte aux droits de l'établissement assujetti, fait usage ou tente de faire usage de faux documents dans le cadre de la conclusion d'une opération de crédit ».
                                                        
                                                         
                                                        <br/><br/>
                                                        Dans tous les cas, les sommes devenues exigibles seront majorées de deux pour cent (2 %) et perçues par la BANQUE à titre de pénalités.
                                                        <br/><br/>
                                                        16.2 – En cas de survenance d’un Incident de Crédit, le BENEFICIAIRE s’expose à une interdiction de crédit, emportant interdiction de conclure une opération de crédit auprès de tout autre établissement bancaire ou de Microfinance ; le BENEFICIAIRE ne recouvrera la faculté de conclure une opération de crédit que s’il justifie avoir régularisé sa situation en remboursant en principal et intérêts, la créance objet de l’incident de crédit.
                                                        <br/><br/>
                                                        16.3 – Le BENEFICIAIRE s’expose pareillement aux sanctions pénales édictées par la loi susvisée, laquelle dispose :
                                                        <br/><br/>
                                                        « Art.20 : Est punie d'un emprisonnement de six (06) mois à cinq (05) ans et d'une amende de cent mille (100.000) à cent millions (100.000.000) de francs CFA, ou de l'une de ces deux peines seulement, toute personne qui, de mauvaise foi, n'a pas remboursé le crédit qui lui a été accordé par un établissement assujetti ».
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
                                                        Le BENEFICIAIRE s'engage à informer la BANQUE au moins un mois à l'avance, par lettre recommandée ou lettre contre décharge, sur son intention de modifier la consistance de tout bien affecté en garantie (mise en location, cession, échange, emphytéose, …etc.). 
                                                        <br/><br/>
                                                        La BANQUE peut faire opposition à la réalisation des mesures et actes juridiques cités ci-dessus dans le délai d'un mois à compter de la réception de la communication. L'opposition doit être motivée. Au cas où le BENEFICIAIRE mettrait à exécution lesdites mesures et actes juridiques malgré l'opposition de la BANQUE, l'article 12 de la présente Convention sera applicable.
                                                        
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
                                                       La BANQUE est autorisée à vérifier à tout moment dans les locaux du BENEFICIAIRE, l'utilisation conforme des facilités accordées, de même qu'à s'informer sur la situation financière du BENEFICIAIRE par un contrôle de la tenue des livres et autres documents du BENEFICIAIRE. Les frais de ces vérifications sont à la charge du BENEFICIAIRE. 
                                                       
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
                                                       Tant que le BENEFICIAIRE sera débiteur en vertu des présentes ou susceptible de l’être, le BENEFICIAIRE, et devra maintenir les biens affectés en garantie sans dépossession en bon état ;  
                                                       
                                                        <br/><br/>
                                                        Pendant cette période, il ne pourra, à moins d’accord préalable et écrit de la BANQUE :
                                                        <ul>
                                                            <li>-   rien faire qui puisse en diminuer la valeur, aliéner, établir, au profit d’un tiers, un privilège supplantant le droit de sûreté de la Banque sur les garanties constituées. </li>
                                                            <li>-   Ni Contracter de nouveaux emprunts qui aggraveraient son endettement, à moins d’y être expressément autorisé par la Banque, ou d’affecter les fonds empruntés au remboursement total ou partiel de sa dette dans les livres de la Banque</li>
                                                        </ul>
                                                        
                                                    </span>
                                                </td>
                                            </tr>


                                              <tr>
                                                <td colspan="2" style="width: 50%; font-size: 16px; font-weight: normal; line-height: 19px;">
                                                    <span class="heading_c" style="display: block; font-size: 13px; font-weight: 600;">
                                                       ARTICLE 20 : SUSPENSION – REFUS DE PAIEMENT – RESILIATION
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" style="width: 50%; font-size: 16px; font-weight: normal; line-height: 15px;">
                                                    <span style="display: block; font-size: 12px; padding: 0; font-weight: 400; text-align: justify;">
                                                        La BANQUE est autorisée à refuser, suspendre sans préavis, exiger le remboursement immédiat des avances consenties avec intérêts et créances accessoires si :
                                                        
                                                        <ol type="a">
                                                            <li>les commissions, les intérêts ou les remboursements exigibles ne sont pas intégralement parvenus à la BANQUE au moment de leur échéance ; </li>
                                                            <li>les montants des facilités ont été utilisés contrairement aux dispositions prévues aux termes de la présente convention ; </li>
                                                            <li>le BENEFICIAIRE a violé d'autres obligations de la présente convention; </li>
                                                            <li>le BENEFICIAIRE est vis-à-vis de la BANQUE en retard dans l'exécution d'engagements financiers découlant d'autres conventions et contrats conclus entre lui et la BANQUE ;  </li>
                                                            <li>des mesures de poursuites sur les biens du BENEFICIAIRE ont lieu ou d'autres circonstances sont survenues qui, de l'avis de la BANQUE excluent ou mettent considérablement en danger la réalisation du projet ou l'accomplissement des engagements pris par le BENEFICIAIRE dans la présente convention ; </li>
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
                                                       BENEFICIAIRE ou de la Banque, pour des raisons  de commodité  des opérations du BENEFICIAIRE .
                                                       <br/><br/>
                                                       En cas de non paiement d'effets tirés sur le BENEFICIAIRE à leurs échéances, la BANQUE pourra toujours à sa convenance, et à toute époque contre-passer le montant des effets impayés, qu'elle ait ou non à exercer des recours cambiaires contre les coobligés. La contre-passation du montant d'un effet laissera subsister le droit de propriété de la BANQUE sur ledit effet.
                                                       <br/><br/>
                                                       La BANQUE adresse mensuellement au client un relevé de son compte. Toute contestation ou réclamation qui ne seraient pas parvenues à la BANQUE TRENTE (30) jours après l'édition du relevé sera réputée non écrite et ne pourra être valablement adressée ni opposée à la BANQUE. Le BENEFICIAIRE étant réputé avoir accepté le contenu de son relevé de compte.  
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
                                                       Dans le cadre de la présente convention de compte courant, et suivant sa demande, la BANQUE s’engage à accorder au BENEFICIAIRE qui accepte, et dès constitution des garanties, la facilité aux caractéristiques ci-après ;

                                                       <table style="border:1px solid #000">
                                                        <tr>
                                                            <td>Nature de la Facilité :</td>
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
                                                            <td>Echéance:</td>
                                                            <td></td>
                                                        </tr>
                                                         <tr>
                                                            <td>Taux d’intérêt annuel :</td>
                                                            <td></td>
                                                        </tr>
                                                         <tr>
                                                            <td>Déroulement de la transaction:</td>
                                                            <td></td>
                                                        </tr>
                                                         <tr>
                                                            <td>Modalités d’utilisation:</td>
                                                            <td></td>
                                                        </tr>
                                                         <tr>
                                                            <td>Frais de dossier et de mise en place:</td>
                                                            <td></td>
                                                        </tr>
                                                         <tr>
                                                            <td>Prime d’assurance Décès Bénéficiaire</td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Fonds de garantie :</td>
                                                            <td></td>
                                                        </tr>
                                                       </table>
                                                      Le Bénéficiaire reconnaît que dans le cadre de son offre de crédit, la Banque a pris grand soin de lui communiquer préalablement les informations complètes sur le coût, les critères d’éligibilité, les conditions et modalités de financement, afin de lui permettre de déterminer si le crédit proposé est adapté à ses besoins et à sa situation financière
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
                                                   Jusqu’à la clôture du compte, les intérêts et commissions dus à la Banque y seront portés et deviendront des articles. 
                                                   <br/><br/>
                                                   L'utilisation effective des lignes des facilités consenties donnera lieu à la perception des intérêts calculés prorata temporis au taux annuel spécifié à l'article 2 ci-dessus, majorés de la taxe sur la valeur ajoutée exigible.
                                                   <br/><br/>
                                                   Les conditions relatives aux intérêts, frais et commissions seront celles fixées selon les usages bancaires, conformément à tout Arrêté du Ministre des Finances de la REPUBLIQUE DU CAMEROUN, ou tout autre texte législatif ou réglementaire qui en tiendrait lieu.
                                                   <br/><br/>
                                                   Conformément à l’article 1.154 du Code Civil, en cas de non-paiement d’une ou plusieurs échéances d’intérêts, les intérêts échus et impayés en produiront eux-mêmes de plein droit.
                                                   <br/><br/>
                                                   Toutes les avances que la BANQUE pourra être amenée à faire à l’occasion du présent acte et de ses suites, notamment tous frais de conservation de sa créance, tous impôts, droits et taxes quelconques, primes d’assurance, frais de gage que la BANQUE payerait en lieu et place du BENEFICIAIRE, notamment par suite de solidarité légale, seront remboursables sans délai et seront productifs d’intérêts au taux ci-dessus prévu, à compter du jour où elles auront été faites ; ces intérêts seront exigibles à tout moment, ainsi que la Taxe sur la Valeur Ajoutée ou tous impôts dont ils pourraient devenir passibles.

                                                   <ul>
                                                    <li>-   maintien du compte par le BENEFICIAIRE sans mouvement créditeur pendant une durée supérieure ou égale à quatre-vingt-dix (90) jours calendaires.</li>
                                                   </ul>

                                                   En cas d’admission du BENEFICIAIRE à toute procédure collective, comme en cas de cessation d’activité ou de cession de l’Entreprise, la clôture du compte interviendra de plein droit, sans préavis
                                                   <br/><br/>
                                                   Le solde du compte sera exigible dès le jour de sa clôture. 
                                                    <br/><br/>
                                                    Les parties au compte pourront approuver les relevés du compte existant entre elles, en fixer la position, en porter le solde dans leurs écritures, sans que ces opérations produisent les effets juridiques d’une clôture du compte et rendent le solde exigible si l’intention de clôturer le compte n’a pas été nettement manifestée. 
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
                                                    Le BENEFICIAIRE reconnaît que les facilités stipulées à l'article 2 ci-dessus lui sont accordées en considération de sa situation économique, et s’engage à tout entreprendre pour préserver  sa capacité de remboursement, et honorer les échéances des facilités à bonne date.
                                                    <br/><br/> 
                                                    En cas de dégradation de la situation économique du BENEFICIAIRE, comme en cas d’inexécution des obligations de remboursement qui lui incombent en vertu du présent acte, les créances de la Banque seront, suivant leur état, et ce conformément aux prescriptions du Règlement COBAC R-2018/01 relatif à la classification, à la comptabilisation et au provisionnement des créances des établissements de crédit, identifiées en « créances sensibles », en « Créances Immobilisées », en « Créances Impayées » ou en « Créances Douteuses ». 
                                                    <br/><br/> 
                                                   La classification en créances douteuses d'une fraction des concours portés par le BENEFICIAIRE entraîne, par effet de contagion, le transfert de l'Intégralité des créances détenues sur lui en encours douteux, nonobstant toute considération liée aux garanties éventuellement détenues.<br/><br/> 
                                                    Les créances sensibles, les créances en souffrance et les créances irrécouvrables seront comptabilisées conformément aux principes aux prescriptions du Règlement COBAC R-2018/01 relatif à la classification, à la comptabilisation et au provisionnement des créances des établissements de crédit. 
                                                    <br/> <br/> 
                                                   L'identification en créances immobilisées, créances impayées et créances douteuses n’emporte pas novation. Cette identification est abandonnée lorsque les paiements reprennent de manière régulière pour les montants correspondant aux échéances et si les arriérés sont apurés.

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
                                                      Le montant du solde exigible et, d’une manière générale, toutes les opérations du compte courant pourront être établies, même vis-à-vis des tiers, par les livres de comptes, registres, et relevés de compte certifiés conformes par le représentant de la BANQUE, appuyés le cas échéant de toutes factures ou reçus  ; Lesdits documents comptables vaudront titre contre le BENEFICIAIRE et les tiers.

                                                      <br/><br/>
                                                      A contrario, les échanges de correspondance et autres documents, même émis par la Banque, ne feront foi de leur contenu que pour autant qu’ils seront fidèles aux livres de comptes, registres et relevés de la comptabilité bancaire ;

                                                      <br/><br/>
                                                      La preuve des opérations et des engagements des Parties sera suffisamment établie par la réconciliation conjointe et simultanée:
                                                      <ul>
                                                        <li>-   du relevé des opérations du compte courant et des compte-chèques rattachés, même ouverts sous un autre nom par le Bénéficiaire;</li>
                                                        <li>-   du relevé des opérations enregistrées dans les sous-comptes rattachés au compte courant et aux compte-chèques du Bénéficiaire, notamment :</li>
                                                        <li>-   du relevé des opérations enregistrées dans les comptes matérialisant des facilités mobilisées par la Banque au profit du BENEFICIAIRE, tant sous forme de trésorerie que par signature ;</li>
                                                        <li>-   du relevé des opérations enregistrées dans les comptes créés, en exécution du Règlement COBAC R-2018/01 relatif à la classification, à la comptabilisation et au provisionnement des créances des établissements de crédit, pour la classification et la comptabilisation des créances devenues « sensibles », « immobilisées », « impayées » ou « douteuses », de même que les intérêts, commissions et taxes enregistrées sur lesdites créances.</li>
                                                    </ul>
                                                    Le BENEFICIAIRE s’engage à : 
                                                    <ul>
                                                        <li>-   Suivre personnellement ou à faire suivre par ses mandataires les opérations passées dans son compte ; </li>
                                                        <li>-   Vérifier l'exactitude des opérations retracées par les relevés de compte et autres justificatifs des transactions  bancaires (bordereaux de versement, factures de carte bancaire, reçus et autres documents) ; </li>
                                                        <li>-   Conserver lesdits justificatifs  aux fins de droit,  et en tout état de cause.</li>
                                                       
                                                      </ul>

                                                      Le cas échéant, toute réclamation éventuelle pourra être formée par le BENEFICIAIRE ou son mandataire, par écrit, au plus tard quatre-vingt-dix (90) jours après la comptabilisation de l’opération contestée.
                                                      <br/><br/>
                                                      Les parties conviennent en conséquence qu’à défaut de contestation écrite par le client quatre-vingt-dix (90) jours après la comptabilisation d’une opération, celle-ci sera En cas de clôture du compte courant, quelque que soit la cause, la BANQUE aura la faculté de contrepasser immédiatement au débit de ce compte, les effets impayés au jour de la clôture, échus ou non échus, de même que tous engagements de quelque nature qu’ils soient, directs ou indirects, présents  ou futurs,  actuels  ou éventuels  que le  BENEFICIAIRE pourra avoir envers la BANQUE dans quelque Agence que ce soit. La BANQUE conservera cependant l’intégralité de ses recours contre les éventuels coobligés et cautions qu’elle exercera dès lors en qualité de créancière gagiste, pour remboursement du solde débiteur du compte courant clôturé.
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
                                                       En application des dispositions des articles 106 et suivants de l’Acte Uniforme portant organisation des sûretés, la BANQUE détient des privilèges généraux sur les biens meubles et immeubles du BENEFICIAIRE.<br/><br/>
                                                        Le BENEFICIAIRE s’engage à fournir, préalablement à la mise en place des facilités, la documentation et les garanties ci-après :<br/><br/>
                                                        Les documents de sûreté fournis garantiront le dénouement des facilités octroyées par la présente convention, ainsi que le solde du compte courant, tel qu’il apparaîtra lors de la clôture : <br/><br/>
                                                        Aucune clause de la présente convention n’interdit, n’empêche, ne restreint, ne limite ou ne gêne la mise en œuvre, par la BANQUE, en cas de non paiement des sommes dues par le BENEFICIAIRE, de droits, actions, gages, hypothèques, cautionnements, avals, nantissements et sûretés de toute nature auxquels se trouveraient assortis les engagements pris par l’emprunteur dans le cadre de la présente convention.<br/><br/>
                                                        Le BENEFICIAIRE s’engage, en tant que de besoin, à fournir à la BANQUE, par acte séparé, à annexer à la présente convention, toute sûreté personnelle ou réelle nécessaire à la sécurisation du remboursement des facilités et du solde éventuellement débiteur du compte courant tel qu’il pourrait apparaître à sa clôture.
                                                        <br/><br/>
                                                        La BANQUE aura, sans préjudice de tous ses autres droits et recours, la faculté de, à tout moment, sans avoir à en aviser le BENEFICIAIRE au préalable, opérer compensation entre tout montant dû par le BENEFICIAIRE, au titre de la présente convention, et tout montant que la BANQUE détiendrait pour le compte du BENEFICIAIRE, en toute monnaie, et en tout lieu, dans ses livres, à quelque titre que ce soit. 
                                                        <br/><br/>
                                                        En aucun cas, le BENEFICIAIRE ne pourra opposer à la BANQUE, dans le cadre de la présente convention, des réclamations ou des exceptions quelles qu’elles soient, tirées de toute autre convention le liant avec elle.

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
                                                       15.1 – Teneur des engagements du Bénéficiaire : La présente convention de Compte Courant fait naître, à la charge du Bénéficiaire et de ses coobligés, l’obligation de satisfaire aux conditions stipulées aux articles 5 et 13 supra et de rembourser à bonne date l’intégralité des avances de trésorerie consenties par la Banque, tant en principal qu’en intérêts, taxes, frais et accessoires.<br/><br/>
                                                        15.2 – Clause pénale : A défaut de remboursement des facilités à bonne date, le BENEFICIAIRE se verra imputer, sur l’encours restant des engagements non remboursés, des pénalités calculées au taux de dix pourcent (10%) des sommes restant dues ; Il en ira de même à la clôture du compte courant, si les engagements exigibles demeures non remboursés sous quinzaine.
                                                        <br/><br/>
                                                        15.3 – Frais d’externalisation : En cas de déclassement des engagements, la Banque aura la faculté d’externaliser le recouvrement auprès des Cabinets Spécialisés de Recouvrement. Dans ce cas, le BENEFICIAIRE se verra imputer des indemnités de recouvrement externalisé représentant Vingt Pourcent (20%) des sommes restant dues ;
                                                        <br/><br/>
                                                        15.4 – Frais et honoraires de recouvrement : Dans le cas où pour parvenir au recouvrement de la créance résultant du présent acte, la Banque se retrouverait obligé d’avoir recours à un mandataire de justice (détectives, Huissiers, Avocats, experts) ou d’exercer des poursuites, l’emprunteur s’oblige à assumer les frais de justice, émoluments, honoraires, frais de procédure et dépens mis à sa charge, et en outre, payera à la Banque une indemnité forfaitaire représentant deux pour cent (2%) des sommes exigibles pour  couvrir les pertes d’intérêts, de frais et de dommages de toutes sortes occasionnés par la nécessité du recours ou des poursuites. 
                                                        <br/><br/>
                                                        15.5 – Dès à présent, le BENEFICIAIRE s’oblige dans les termes ci-dessus, et donne d’ores et déjà l’ordre irrévocable à la BANQUE de débiter son compte le cas échéant.


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
                                                       16.1 – Le non-remboursement des facilités accordées en vertu de la présente convention constitue, au même titre que le non-respect d’un moratoire, un Incident de Crédit au sens de la loi N°2019/021 du 24 décembre 2019 fixant certaines règles relatives à l’activité de crédit dans les secteurs bancaires et de la Microfinance au Cameroun ;<br/><br/>
                                                       <ul>
                                                           <li>f)   le compte du BENEFICIAIRE ouvert dans les livres de la BANQUE reste sans mouvement créditeur de sa part pendant trente (30) jours calendaires. </li>
                                                       </ul>
                                                        Toutefois, la BANQUE ne pourra exercer ses droits prévus aux alinéas (a) à (d) du présent article que si le BENEFICIAIRE ne répond pas à la sommation de paiement ou de cessation d'une violation de la convention et/ou d'en écarter les suites dans un délai de 30 jours à compter de l'envoi de cette sommation par lettre contre décharge ou lettre recommandée avec accusé de réception, par télex ou téléfax.
                                                       
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
                                                      Le BENEFICIAIRE prend à sa charge tous droits, impôts, taxes présents et futurs, de quelque nature que ce soit en relation avec la convention de facilités ou son exécution, au Cameroun ou à l’extérieur, notamment ceux qui sont liés à la constitution, à l'inscription et le cas échéant à la radiation des sûretés, au versement du prêt et au virement à effectuer d'après le présent contrat.
                                                      <br/><br/>
                                                       Le BENEFICIAIRE autorise la BANQUE à débiter son compte pour le règlement de ces frais.
                                                        <br/><br/>
                                                       Tous les versements à effectuer par le BENEFICIAIRE au chiffre 2 du présent article deviennent exigibles dès que la BANQUE demande leur paiement au BENEFICIAIRE.
                                                        
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
                                                      Le BENEFICIAIRE déclare ès qualité :

                                                      <ul>
                                                          
                                                        <li>-   Que toutes les informations fournies dans le cadre de la présente convention sont exactes ;</li>
                                                        <li>-   Que les garanties concédées en sécurisation du remboursement des facilités objet de la présente, serviront également à la couverture du solde des autres comptes éventuellement débiteurs du BENEFICIAIRE, ou d’autres concours que la Banque pourrait être amenée à lui concéder. </li>
                                                        <li>-   Qu’il jouit de la pleine capacité requise pour contracter dans le cadre du présent acte et consentir toute sûreté.</li>
                                                      
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
                                                       Les droits du BENEFICIAIRE résultant de la présente convention ne peuvent être ni cédés ni grevés. Ils engagent cependant ses ayants droit. 
                                                       <br/><br/>
                                                        Les modifications et avenants à la présente convention doivent être faits par écrit.
                                                        <br/><br/>
                                                       L'invalidation d'une clause de la présente convention n'entache pas la validité des autres dispositions. Les clauses invalides seront aussitôt remplacées par les parties contractantes par des dispositions conformes à la législation et aux usages en vigueur. A défaut, les dispositions du droit positif prévaudront, suppléées le cas échéant par les principes généraux du droit applicables. Si subsiste un vide juridique, les dispositions supplétives seront
                                                        <br/><br/>
                                                       Le fait pour la BANQUE de ne pas user, d'un droit dont elle jouit en vertu du présent contrat n'emporte pas renonciation à ce droit. 
                                                        <br/><br/>
                                                       Le présent contrat est soumis au droit camerounais. Il entrera en vigueur dès sa signature et engagera les parties jusqu'à plein accomplissement de la totalité des obligations de paiement au bénéfice de la BANQUE.
                                                       <br/><br/>
                                                        Pour l’exécution des présentes et de leurs suites, les Parties font élection de domicile en leur siège social respectif ci-dessus indiqué.

                                                    </span>
                                                </td>
                                            </tr>


                                             <tr>
                                                <td colspan="2" style="height: 10px; width: 100%;"></td>
                                            </tr>
                                           <tr>
                                                <td colspan="2" style="width: 50%; font-size: 16px; font-weight: normal; line-height: 19px;">
                                                    <span class="heading_c" style="display: block; font-size: 13px; font-weight: 600;">
                                                 <?php echo strtoupper("ARTICLE 24 : Règlement de différends"); ?>
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" style="width: 50%; font-size: 16px; font-weight: normal; line-height: 15px;">
                                                    <span style="display: block; font-size: 12px; padding: 0; font-weight: 400; text-align: justify;">
                                                       En cas de différend entre les Parties ayant trait à la validité, l’interprétation, l’exécution ou l’inexécution du présent contrat, les Parties s’obligent à se concerter et à rechercher un règlement amiable dans un délai de trente (30) jours suivant la notification par une Partie au litige à l’autre Partie, de l’objet du différend né, ou susceptible de naître. Ce délai peut être prorogé d’une durée égale d’accord Parties.<br/><br/>
                                                       Tout différend qui n’aurait pas été réglé à l’amiable dans les délais ci-dessus prévus, sera soumis à la juridiction compétente dans le ressort de laquelle est situé le siège social ou le domicile du défendeur.
                                                       
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
                                                      Le présent contrat est régi exclusivement par le droit camerounais.<br/><br/>
                                                       
                                                    </span>
                                                </td>
                                            </tr>

                                            
                                            <tr>
                                                <td colspan="2" style="height: 50px; width: 100%;"></td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" style="width: 50%; font-size: 16px; font-weight: normal; line-height: 15px;">
                                                    <span style="display: block; font-size: 12px; padding: 0; font-weight: 400;">
                                                        Fait à ----------------------------------------------, le -------------------------
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
                <td colspan="2" style="font-size:12px;"><span style="margin-left: 15%;margin-right: 35%;">Pour L’EMPRUNTEUR</span> <span style="margin-right: 15%"> Pour LA BANQUE</span></td>
               
                
            </tr>
        </tbody>
    </table>
     <button type="button" style="margin:10px 10px ;" onclick="window.print()">PRINT</button>
</body>

</html>
