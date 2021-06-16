<?php
// loan_interest
// print_r($loandetails[0]);
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
<HEAD>
	<META HTTP-EQUIV="CONTENT-TYPE" CONTENT="text/html; charset=utf-8">
	<TITLE></TITLE>
	<META NAME="GENERATOR" CONTENT="LibreOffice 4.1.6.2 (Linux)">
	<META NAME="AUTHOR" CONTENT="victor.fotso">
	<META NAME="CREATED" CONTENT="20190905;222200000000000">
	<META NAME="CHANGEDBY" CONTENT="JACK BAUER">
	<META NAME="CHANGED" CONTENT="20190905;222200000000000">
	<META NAME="AppVersion" CONTENT="15.0000">
	<META NAME="Company" CONTENT="HP">
	<META NAME="DocSecurity" CONTENT="0">
	<META NAME="HyperlinksChanged" CONTENT="false">
	<META NAME="LinksUpToDate" CONTENT="false">
	<META NAME="ScaleCrop" CONTENT="false">
	<META NAME="ShareDoc" CONTENT="false">
	<STYLE TYPE="text/css">
	<!--
		@page { margin: 0.98in }
		P { margin-left: 0.5in; text-indent: -0.5in; margin-bottom: 0in; direction: ltr; line-height: 301%;; text-align: justify; widows: 2; orphans: 2 }
		P.western { font-family: "Times New Roman", serif; font-size: 9pt }
		P.cjk { font-family: "Times New Roman"; font-size: 9pt; so-language: fr-FR }
		P.ctl { font-family: "Times New Roman"; font-size: 10pt; font-weight: bold }
	-->
	</STYLE>
	<style type="text/css" media="print">
  @page { size: landscape; }
  @media print {
		  #printPageButton {
		    display: none;
		  }
		}
</style>

</HEAD>
<BODY LANG="fr-FR" DIR="LTR">
<P CLASS="western" STYLE="margin-left: 0in; text-indent: 0in"><A NAME="_GoBack"></A>
<FONT FACE="Trebuchet MS, serif"><FONT SIZE=3><FONT FACE="Times New Roman, serif"><FONT SIZE=2 STYLE="display: block;
    text-align: center;
    font-size: 20px;line-height: 4px !important;margin-top:99px"><B>PROGARMME
DE FINANCEMENT CONTRE GAGE ESPECES </B></FONT></FONT></FONT></FONT>
</P>
<P CLASS="western" ALIGN=CENTER STYLE="margin-left: 0in; text-indent: 0in">
<FONT FACE="Trebuchet MS, serif"><FONT SIZE=3><FONT FACE="Times New Roman, serif"><FONT SIZE=4 style="    display: block;
    text-align: center;
    font-size: 20px;line-height: 20px !important;"><B>DEMANDE
D’APPROBATION DE CREDIT</B></FONT></FONT></FONT></FONT></P>
<TABLE WIDTH=100% CELLPADDING=7 CELLSPACING=0 class="tabeldata" style="overflow-x:hidden;margin-top: 15px;padding-right: 45px;
    padding-bottom: 45px;
    padding-left: 45px;">
	<COL WIDTH=328>
	<COL WIDTH=297>
	<TR>
		<TD WIDTH=328 HEIGHT=23 STYLE="border: 1px dotted #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
			<P CLASS="western" ALIGN=LEFT STYLE="margin-left: 0in; text-indent: 0in">
			<FONT FACE="Trebuchet MS, serif"><FONT SIZE=3><FONT FACE="Times New Roman, serif"><FONT SIZE=2 STYLE="font-size: 11pt">Emprunteur</FONT></FONT></FONT></FONT></P>
		</TD>
		<TD WIDTH=297 STYLE="border: 1px dotted #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
			<P CLASS="western" ALIGN=LEFT STYLE="margin-left: 0in; text-indent: 0in">
				<?php print_r($pinfo[0]['first_name'].' '.$pinfo[0]['middle_name'].' '.$pinfo[0]['last_name']) ?>
			</P>
		</TD>
	</TR>
	<TR>
		<TD WIDTH=328 HEIGHT=24 STYLE="border: 1px dotted #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
			<P CLASS="western" ALIGN=LEFT STYLE="margin-left: 0in; text-indent: 0in">
			<FONT FACE="Trebuchet MS, serif"><FONT SIZE=3><FONT FACE="Times New Roman, serif"><FONT SIZE=2 STYLE="font-size: 11pt">Numéro
			du compte du client</FONT></FONT></FONT></FONT></P>
		</TD>
		<TD WIDTH=297 STYLE="border: 1px dotted #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
			<P CLASS="western" ALIGN=LEFT STYLE="margin-left: 0in; text-indent: 0in">
				<?php if(!empty($acinfo)) { print_r($acinfo[0]['field_4']); } else { echo $loandetails[0]['account_number']; } ?>
			</P>
		</TD>
	</TR>
	<TR>
		<TD WIDTH=328 HEIGHT=24 STYLE="border: 1px dotted #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
			<P CLASS="western" ALIGN=LEFT STYLE="margin-left: 0in; text-indent: 0in">
			<FONT FACE="Trebuchet MS, serif"><FONT SIZE=3><FONT FACE="Times New Roman, serif"><FONT SIZE=2 STYLE="font-size: 11pt">Principal
			dirigeant </FONT></FONT></FONT></FONT>
			</P>
		</TD>
		<TD WIDTH=297 STYLE="border: 1px dotted #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
			<P CLASS="western" ALIGN=LEFT STYLE="margin-left: 0in; text-indent: 0in">
			<BR>
			</P>
		</TD>
	</TR>
	<TR>
		<TD WIDTH=328 HEIGHT=24 STYLE="border: 1px dotted #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
			<P CLASS="western" ALIGN=LEFT STYLE="margin-left: 0in; text-indent: 0in">
			<FONT FACE="Trebuchet MS, serif"><FONT SIZE=3><FONT FACE="Times New Roman, serif"><FONT SIZE=2 STYLE="font-size: 11pt">Nature
			du crédit  (liste déroulante)<BR>(Découvert, CCT, CMT,
			Cautions, LC)</FONT></FONT></FONT></FONT></P>
		</TD>
		<TD WIDTH=297 STYLE="border: 1px dotted #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
			<P CLASS="western" ALIGN=LEFT STYLE="margin-left: 0in; text-indent: 0in">
				<?php if(!empty($loandetails)) { print_r($loandetails[0]['ltype']); } else { echo ""; } ?>
			</P>
		</TD>
	</TR>
	<TR>
		<TD WIDTH=328 HEIGHT=24 STYLE="border: 1px dotted #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
			<P CLASS="western" ALIGN=LEFT STYLE="margin-left: 0in; text-indent: 0in">
			<FONT FACE="Trebuchet MS, serif"><FONT SIZE=3><FONT FACE="Times New Roman, serif"><FONT SIZE=2 STYLE="font-size: 11pt">Montant
			de BDC, DAT, Cash call, Cpte Epargne</FONT></FONT></FONT></FONT></P>
		</TD>
		<TD WIDTH=297 STYLE="border: 1px dotted #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
			<P CLASS="western" ALIGN=LEFT STYLE="margin-left: 0in; text-indent: 0in">
			 -
			</P>
		</TD>
	</TR>
	<TR>
		<TD WIDTH=328 HEIGHT=24 STYLE="border: 1px dotted #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
			<P CLASS="western" ALIGN=LEFT STYLE="margin-left: 0in; text-indent: 0in">
			<FONT FACE="Trebuchet MS, serif"><FONT SIZE=3><FONT FACE="Times New Roman, serif"><FONT SIZE=2 STYLE="font-size: 11pt">Montant
			de la ligne  de crédit sollicité (saisie)</FONT></FONT></FONT></FONT></P>
		</TD>
		<TD WIDTH=297 STYLE="border: 1px dotted #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
			<P CLASS="western" ALIGN=LEFT STYLE="margin-left: 0in; text-indent: 0in">
				<?php if(!empty($loandetails)) { print_r($loandetails[0]['loan_amt']); } else { echo ""; } ?>
			</P>
		</TD>
	</TR>
	<TR>
		<TD WIDTH=328 HEIGHT=24 STYLE="border: 1px dotted #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
			<P CLASS="western" ALIGN=LEFT STYLE="margin-left: 0in; text-indent: 0in">
			<FONT FACE="Trebuchet MS, serif"><FONT SIZE=3><FONT FACE="Times New Roman, serif"><FONT SIZE=2 STYLE="font-size: 11pt">Durée
			du Crédit (saisie)</FONT></FONT></FONT></FONT></P>
		</TD>
		<TD WIDTH=297 STYLE="border: 1px dotted #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
			<P CLASS="western" ALIGN=LEFT STYLE="margin-left: 0in; text-indent: 0in">
				<?php echo ""; // if(!empty($loandetails)) { print_r($loandetails[0]['loan_term']); } else { echo ""; } ?>
			</P>
		</TD>
	</TR>
	<TR>
		<TD WIDTH=328 HEIGHT=24 STYLE="border: 1px dotted #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
			<P CLASS="western" ALIGN=LEFT STYLE="margin-left: 0in; text-indent: 0in">
			<FONT FACE="Trebuchet MS, serif"><FONT SIZE=3><FONT FACE="Times New Roman, serif"><FONT SIZE=2 STYLE="font-size: 11pt">Taux
			D’intérêt (saisie)</FONT></FONT></FONT></FONT></P>
		</TD>
		<TD WIDTH=297 STYLE="border: 1px dotted #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
			<P CLASS="western" ALIGN=LEFT STYLE="margin-left: 0in; text-indent: 0in">
				<?php if(!empty($loandetails)) { print_r($loandetails[0]['loan_interest']); } else { echo ""; } ?>
			</P>
		</TD>
	</TR>
	<TR>
		<TD WIDTH=328 HEIGHT=24 STYLE="border: 1px dotted #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
			<P CLASS="western" ALIGN=LEFT STYLE="margin-left: 0in; text-indent: 0in">
			<FONT FACE="Trebuchet MS, serif"><FONT SIZE=3><FONT FACE="Times New Roman, serif"><FONT SIZE=2 STYLE="font-size: 11pt">Date
			et Lieu de naissance</FONT></FONT></FONT></FONT></P>
		</TD>
		<TD WIDTH=297 STYLE="border: 1px dotted #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
			<P CLASS="western" ALIGN=LEFT STYLE="margin-left: 0in; text-indent: 0in">
				<?php if(!empty($pinfo)) { print_r($pinfo[0]['dob']); } else { echo ""; } ?>
			</P>
		</TD>
	</TR>
	<TR>
		<TD WIDTH=328 HEIGHT=24 STYLE="border: 1px dotted #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
			<P CLASS="western" ALIGN=LEFT STYLE="margin-left: 0in; text-indent: 0in">
			<FONT FACE="Trebuchet MS, serif"><FONT SIZE=3><FONT FACE="Times New Roman, serif"><FONT SIZE=2 STYLE="font-size: 11pt">Numéro
			Passeport</FONT></FONT></FONT></FONT></P>
		</TD>
		<TD WIDTH=297 STYLE="border: 1px dotted #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
			<P CLASS="western" ALIGN=LEFT STYLE="margin-left: 0in; text-indent: 0in">
				<?php if(!empty($stinfo)) { print_r($stinfo[0]['id_number']); } else { echo ""; } ?>
			</P>
		</TD>
	</TR>
	<TR>
		<TD WIDTH=328 HEIGHT=24 STYLE="border: 1px dotted #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
			<P CLASS="western" ALIGN=LEFT STYLE="margin-left: 0in; text-indent: 0in">
			<FONT FACE="Trebuchet MS, serif"><FONT SIZE=3><FONT FACE="Times New Roman, serif"><FONT SIZE=2 STYLE="font-size: 11pt">Date
			de délivrance</FONT></FONT></FONT></FONT></P>
		</TD>
		<TD WIDTH=297 STYLE="border: 1px dotted #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
			<P CLASS="western" ALIGN=LEFT STYLE="margin-left: 0in; text-indent: 0in">
				<?php if(!empty($loandetails)) { print_r($loandetails[0]['created']); } else { echo ""; } ?>
			</P>
		</TD>
	</TR>
	<TR>
		<TD WIDTH=328 HEIGHT=23 STYLE="border: 1px dotted #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
			<P CLASS="western" ALIGN=LEFT STYLE="margin-left: 0in; text-indent: 0in">
			<FONT FACE="Trebuchet MS, serif"><FONT SIZE=3><FONT FACE="Times New Roman, serif"><FONT SIZE=2 STYLE="font-size: 11pt">Profession</FONT></FONT></FONT></FONT></P>
		</TD>
		<TD WIDTH=297 STYLE="border: 1px dotted #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
			<P CLASS="western" ALIGN=LEFT STYLE="margin-left: 0in; text-indent: 0in">
				<?php if(!empty($stinfo)) { print_r($stinfo[0]['occupation']); } else { echo ""; } ?>
			</P>
		</TD>
	</TR>
</TABLE>
<P CLASS="western" ALIGN=LEFT STYLE="margin-left: 0in; text-indent: 0in; margin-top: 0.08in; margin-bottom: 0.08in">
<FONT FACE="Trebuchet MS, serif"><FONT SIZE=3><FONT FACE="Times New Roman, serif"><FONT SIZE=2 STYLE="font-size: 11pt;padding-left: 45px;"><B>Vérification
des critères d’approbation (check list)</B></FONT></FONT></FONT></FONT></P>
<TABLE WIDTH=100% CELLPADDING=7 CELLSPACING=0 style="padding-right: 45px;
    padding-bottom: 45px;
    padding-left: 45px;">
	<COL WIDTH=516>
	<COL WIDTH=50>
	<COL WIDTH=45>
	<TR>
		<TD WIDTH=516 HEIGHT=13 STYLE="border-top: 1px dotted #00000a; border-bottom: 1px dotted #00000a; border-left: 1px dotted #00000a; border-right: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
			<P CLASS="western" ALIGN=LEFT STYLE="margin-left: 0in; text-indent: 0in">
			<BR>
			</P>
		</TD>
		<TD WIDTH=50 STYLE="border: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
			<P CLASS="western" ALIGN=LEFT STYLE="margin-left: 0in; text-indent: 0in">
			<FONT FACE="Trebuchet MS, serif"><FONT SIZE=3><FONT FACE="Times New Roman, serif"><FONT SIZE=2 STYLE="font-size: 11pt">OUI</FONT></FONT></FONT></FONT></P>
		</TD>
		<TD WIDTH=45 STYLE="border: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
			<P CLASS="western" ALIGN=LEFT STYLE="margin-left: 0in; text-indent: 0in">
			<FONT FACE="Trebuchet MS, serif"><FONT SIZE=3><FONT FACE="Times New Roman, serif"><FONT SIZE=2 STYLE="font-size: 11pt">NON</FONT></FONT></FONT></FONT></P>
		</TD>
	</TR>
	<TR>
		<TD WIDTH=516 HEIGHT=13 STYLE="border-top: 1px dotted #00000a; border-bottom: 1px dotted #00000a; border-left: 1px dotted #00000a; border-right: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
			<P CLASS="western" ALIGN=LEFT STYLE="margin-left: 0in; text-indent: 0in">
			<FONT FACE="Trebuchet MS, serif"><FONT SIZE=3><FONT FACE="Times New Roman, serif"><FONT SIZE=2 STYLE="font-size: 11pt">L’emprunteur
			a un compte courant à la BACM </FONT></FONT></FONT></FONT>
			</P>
		</TD>
		<TD WIDTH=50 STYLE="border: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
			<P CLASS="western" ALIGN=LEFT STYLE="margin-left: 0in; text-indent: 0in">
			<BR>
			</P>
		</TD>
		<TD WIDTH=45 STYLE="border: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
			<P CLASS="western" ALIGN=LEFT STYLE="margin-left: 0in; text-indent: 0in">
			<BR>
			</P>
		</TD>
	</TR>
	<TR>
		<TD WIDTH=516 HEIGHT=12 STYLE="border-top: 1px dotted #00000a; border-bottom: 1px dotted #00000a; border-left: 1px dotted #00000a; border-right: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
			<P ALIGN=LEFT STYLE="margin-left: 0in; text-indent: 0in"><FONT FACE="Trebuchet MS, serif"><FONT SIZE=2><FONT FACE="Times New Roman, serif"><FONT SIZE=2 STYLE="font-size: 11pt">Le
			gage espèces représente au moins 100%&nbsp;, 110% et 120% du
			montant de la facilité</FONT></FONT></FONT></FONT></P>
		</TD>
		<TD WIDTH=50 STYLE="border: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
			<P CLASS="western" ALIGN=LEFT STYLE="margin-left: 0in; text-indent: 0in">
			<BR>
			</P>
		</TD>
		<TD WIDTH=45 STYLE="border: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
			<P CLASS="western" ALIGN=LEFT STYLE="margin-left: 0in; text-indent: 0in">
			<BR>
			</P>
		</TD>
	</TR>
	<TR>
		<TD WIDTH=516 HEIGHT=15 STYLE="border-top: 1px dotted #00000a; border-bottom: 1px dotted #00000a; border-left: 1px dotted #00000a; border-right: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
			<P CLASS="western" ALIGN=LEFT STYLE="margin-left: 0in; text-indent: 0in">
			<FONT FACE="Trebuchet MS, serif"><FONT SIZE=3><FONT FACE="Times New Roman, serif"><FONT SIZE=2 STYLE="font-size: 11pt">La
			convention de transfert fiduciaire de somme d’argent est établie
			et signée du client</FONT></FONT></FONT></FONT></P>
		</TD>
		<TD WIDTH=50 STYLE="border: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
			<P CLASS="western" ALIGN=LEFT STYLE="margin-left: 0in; text-indent: 0in">
			<BR>
			</P>
		</TD>
		<TD WIDTH=45 STYLE="border: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
			<P CLASS="western" ALIGN=LEFT STYLE="margin-left: 0in; text-indent: 0in">
			<BR>
			</P>
		</TD>
	</TR>
	<TR>
		<TD WIDTH=516 HEIGHT=14 STYLE="border-top: 1px dotted #00000a; border-bottom: 1px dotted #00000a; border-left: 1px dotted #00000a; border-right: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
			<P CLASS="western" ALIGN=LEFT STYLE="margin-left: 0in; text-indent: 0in">
			<FONT FACE="Trebuchet MS, serif"><FONT SIZE=3><FONT FACE="Times New Roman, serif"><FONT SIZE=2 STYLE="font-size: 11pt">Le
			montant de la facilité n’excède pas  le plafond autorisé </FONT></FONT></FONT></FONT>
			</P>
		</TD>
		<TD WIDTH=50 STYLE="border: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
			<P CLASS="western" ALIGN=LEFT STYLE="margin-left: 0in; text-indent: 0in">
			<BR>
			</P>
		</TD>
		<TD WIDTH=45 STYLE="border: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
			<P CLASS="western" ALIGN=LEFT STYLE="margin-left: 0in; text-indent: 0in">
			<BR>
			</P>
		</TD>
	</TR>
	<TR>
		<TD WIDTH=516 HEIGHT=4 STYLE="border-top: 1px dotted #00000a; border-bottom: 1px dotted #00000a; border-left: 1px dotted #00000a; border-right: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
			<P CLASS="western" ALIGN=LEFT STYLE="margin-left: 0in; text-indent: 0in">
			<FONT FACE="Trebuchet MS, serif"><FONT SIZE=3><FONT FACE="Times New Roman, serif"><FONT SIZE=2 STYLE="font-size: 11pt">Rapport
			d’Informations de Base et Renseignements Commerciaux favorables </FONT></FONT></FONT></FONT>
			</P>
		</TD>
		<TD WIDTH=50 STYLE="border: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
			<P CLASS="western" ALIGN=LEFT STYLE="margin-left: 0in; text-indent: 0in">
			<BR>
			</P>
		</TD>
		<TD WIDTH=45 STYLE="border: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
			<P CLASS="western" ALIGN=LEFT STYLE="margin-left: 0in; text-indent: 0in">
			<BR>
			</P>
		</TD>
	</TR>
	<TR>
		<TD WIDTH=516 HEIGHT=5 STYLE="border-top: 1px dotted #00000a; border-bottom: 1px dotted #00000a; border-left: 1px dotted #00000a; border-right: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
			<P CLASS="western" ALIGN=LEFT STYLE="margin-left: 0in; text-indent: 0in">
			<FONT FACE="Trebuchet MS, serif"><FONT SIZE=3><FONT FACE="Times New Roman, serif"><FONT SIZE=2 STYLE="font-size: 11pt">Demande
			de crédit du client est recueillie</FONT></FONT></FONT></FONT></P>
		</TD>
		<TD WIDTH=50 STYLE="border: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
			<P CLASS="western" ALIGN=LEFT STYLE="margin-left: 0in; text-indent: 0in">
			<BR>
			</P>
		</TD>
		<TD WIDTH=45 STYLE="border: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
			<P CLASS="western" ALIGN=LEFT STYLE="margin-left: 0in; text-indent: 0in">
			<BR>
			</P>
		</TD>
	</TR>
	<TR>
		<TD WIDTH=516 HEIGHT=4 STYLE="border-top: 1px dotted #00000a; border-bottom: 1px dotted #00000a; border-left: 1px dotted #00000a; border-right: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
			<P CLASS="western" ALIGN=LEFT STYLE="margin-left: 0in; text-indent: 0in">
			<FONT FACE="Trebuchet MS, serif"><FONT SIZE=3><FONT FACE="Times New Roman, serif"><FONT SIZE=2 STYLE="font-size: 11pt">Billet
			à Ordre</FONT></FONT></FONT></FONT></P>
		</TD>
		<TD WIDTH=50 STYLE="border: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
			<P CLASS="western" ALIGN=LEFT STYLE="margin-left: 0in; text-indent: 0in">
			<BR>
			</P>
		</TD>
		<TD WIDTH=45 STYLE="border: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
			<P CLASS="western" ALIGN=LEFT STYLE="margin-left: 0in; text-indent: 0in">
			<BR>
			</P>
		</TD>
	</TR>
</TABLE>
<P CLASS="western" STYLE="margin-left: 0.01in; text-indent: -0.01in"><BR>
</P>
<P LANG="en-GB" ALIGN=LEFT STYLE="margin-left: 0in; text-indent: 0in">
<BR>
</P>
<P CLASS="western" ALIGN=LEFT STYLE="margin-left: 0in; text-indent: 0in">
<BR>
</P>
<center>
			<button class="btn btn-primary hidden-print" id="printPageButton" onclick="myfunction()" style="position: relative;top: -64px">Print Page</button>
		</center>

		<script src="<?php echo  base_url(); ?>assets/js/demo-skin-changer.js"></script> 
<script src="<?php echo  base_url(); ?>assets/js/jquery.js"></script> 
<script src="<?php echo  base_url(); ?>assets/js/bootstrap.js"></script> 
<script src="<?php echo  base_url(); ?>assets/js/jquery.nanoscroller.min.js"></script> 
<script src="<?php echo  base_url(); ?>assets/js/demo.js"></script> 

<script type="text/javascript">
	function myfunction(){
		window.print();
	}
</script>

</BODY>
</HTML>