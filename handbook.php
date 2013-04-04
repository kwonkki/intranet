<?
include_once("./_common.php");


$g4['title'] = "working status";
include_once("./_head.php");

// 바꾼 시간도 저장...
if($_POST['status']){
	$tmp_sql = " update $g4[login_table] set status = '$_POST[status]' where mb_id = '$member[mb_id]' ";
	
	sql_query($tmp_sql, FALSE);
}

$sql1 = " select * from g4_login where mb_id  ='$member[mb_id]'  ";
$sql_login = sql_fetch($sql1);


?>
<STYLE TYPE="text/css">
<!--
	@page { margin: 0.33in }
	@page:first { }
	P { margin-bottom: 0.08in; direction: ltr; color: #000000; line-height: 100%; widows: 2; orphans: 2 }
	P.western { font-family: "Times New Roman", serif; font-size: 12pt }
	P.cjk { font-size: 12pt }
	P.ctl { font-family: "Times New Roman"; font-size: 12pt }
	A:link { color: #0000ff; so-language: zxx }
-->
</STYLE>

<DIV TYPE=HEADER>
	<P STYLE="margin-bottom: 0in"><BR>
	</P>
</DIV>


</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><BR>
</P>
<P CLASS="western" STYLE="margin-bottom: 0in"><B>JOINING
DOCKET POLICY</B></P>

	<TABLE WIDTH=430 BORDER=1 BORDERCOLOR="#00000a" CELLPADDING=7 CELLSPACING=0>
		<COL WIDTH=53>
		<COL WIDTH=204>
		<COL WIDTH=128>
		<TR VALIGN=TOP>
			<TD WIDTH=53 HEIGHT=8>
				<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in"><BR>
				</P>
			</TD>
			<TD WIDTH=204>
				<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in">
				<FONT FACE="Calibri, serif"><B>Release Date:</B></FONT></P>
				<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in"><FONT FACE="Calibri, serif">February
				2012</FONT></P>
			</TD>
			<TD WIDTH=128>
				<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in">
				<FONT FACE="Calibri, serif"><B>Review Date:</B></FONT></P>
				<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in"><FONT FACE="Calibri, serif"><B>June
				2013</B></FONT></P>
			</TD>
		</TR>
		<TR VALIGN=TOP>
			<TD WIDTH=53 HEIGHT=8>
				<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in">
				<FONT FACE="Calibri, serif"><B>Version:</B></FONT></P>
				<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in"><FONT FACE="Calibri, serif"><B>1.0</B></FONT></P>
			</TD>
			<TD WIDTH=204>
				<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in">
				<FONT FACE="Calibri, serif"><B>Process Owner:</B></FONT></P>
				<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in"><FONT FACE="Calibri, serif">Human
				Resource </FONT>
				</P>
			</TD>
			<TD WIDTH=128>
				<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in">
				<FONT FACE="Calibri, serif"><B>Process Administrator:</B></FONT></P>
				<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in"><FONT FACE="Calibri, serif">Supervisors/HOD/HR</FONT></P>
			</TD>
		</TR>
	</TABLE>

<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><U><B>Objective</B></U></P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in">The
objective of the policy is to ensure that every new recruit hands
over the joining formalities in accordance with the requirements of
the company.</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><U><B>Eligibility
</B></U>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in">All new
recruits</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><U><B>Requirements:</B></U></P>
<P ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><FONT FACE="Times New Roman, serif"><FONT SIZE=3>Requirements
must be submitted within the prescribed date.  Failure to do so shall
result in documented reminder following disciplinary action. </FONT></FONT>
</P>
<P ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><BR>
</P>
<P ALIGN=CENTER STYLE="margin-bottom: 0in"><FONT FACE="Times New Roman, serif"><FONT SIZE=3><FONT FACE="Calibri, serif"><U><B>201
COMPLETION PROCESS</B></U></FONT></FONT></FONT></P>
<P ALIGN=CENTER STYLE="margin-bottom: 0in"><BR>
</P>
<TABLE WIDTH=586 BORDER=1 BORDERCOLOR="#00000a" CELLPADDING=7 CELLSPACING=0>
	<COL WIDTH=289>
	<COL WIDTH=267>
	<TR VALIGN=TOP>
		<TD WIDTH=289 HEIGHT=121>
			<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in">
			<BR>
			</P>
			<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in"><FONT FACE="Calibri, serif"><B>201
			File </B></FONT>
			</P>
		</TD>
		<TD WIDTH=267>
			<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in">
			<BR>
			</P>
			<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in"><FONT FACE="Calibri, serif"><B>Date
			of Submission</B></FONT></P>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD WIDTH=289 HEIGHT=122>
			<UL>
				<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><FONT FACE="Times New Roman, serif"><FONT SIZE=3>Birth
				Certificate</FONT></FONT></P>
				<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><FONT FACE="Times New Roman, serif"><FONT SIZE=3>2
				Valid IDs (government issued)</FONT></FONT></P>
				<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><FONT FACE="Times New Roman, serif"><FONT SIZE=3>House
				Sketch</FONT></FONT></P>
				<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><FONT FACE="Times New Roman, serif"><FONT SIZE=3>NBI
				Clearance</FONT></FONT></P>
				<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><FONT FACE="Times New Roman, serif"><FONT SIZE=3>Police
				Clearance</FONT></FONT></P>
				<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><FONT FACE="Times New Roman, serif"><FONT SIZE=3>Pre-employment
				Medical Check Up Certificate/Report</FONT></FONT></P>
				<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><FONT FACE="Times New Roman, serif"><FONT SIZE=3>For
				Expats, they must submit themselves to Medical Assessment within
				48 hours upon start of work.</FONT></FONT></P>
				<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><FONT FACE="Times New Roman, serif"><FONT SIZE=3>Drug
				Test</FONT></FONT></P>
				<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><FONT FACE="Times New Roman, serif"><FONT SIZE=3>Payslip
				from previous company</FONT></FONT></P>
			</UL>
			<P CLASS="western" ALIGN=JUSTIFY><BR>
			</P>
		</TD>
		<TD WIDTH=267>
			<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in">
			<BR>
			</P>
			<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in">
			<BR>
			</P>
			<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in">
			<BR>
			</P>
			<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in"><FONT FACE="Calibri, serif">On
			or before the first day of employment of the employee</FONT></P>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD WIDTH=289 HEIGHT=122>
			<UL>
				<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><FONT FACE="Times New Roman, serif"><FONT SIZE=3>Employment
				Contract</FONT></FONT></P>
				<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><FONT FACE="Times New Roman, serif"><FONT SIZE=3>Technology
				Assessment Agreement</FONT></FONT></P>
				<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><FONT FACE="Times New Roman, serif"><FONT SIZE=3>Confidentiality
				Agreement</FONT></FONT></P>
				<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><FONT FACE="Times New Roman, serif"><FONT SIZE=3>Mandatory
				Information Sheet</FONT></FONT></P>
				<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><FONT FACE="Times New Roman, serif"><FONT SIZE=3>BIR
				Forms</FONT></FONT></P>
				<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><FONT FACE="Times New Roman, serif"><FONT SIZE=3>Philhealth
				Forms</FONT></FONT></P>
				<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><FONT FACE="Times New Roman, serif"><FONT SIZE=3>Pagibig
				Forms </FONT></FONT>
				</P>
				<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><FONT FACE="Times New Roman, serif"><FONT SIZE=3>House
				Rules(for Expat)</FONT></FONT></P>
			</UL>
			<P ALIGN=JUSTIFY STYLE="margin-left: 0.5in"><BR>
			</P>
		</TD>
		<TD WIDTH=267>
			<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in">
			<BR>
			</P>
			<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in">
			<BR>
			</P>
			<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in">
			to be submitted to the HR Department within  three (3) days</P>
			<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in"><BR>
			</P>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD WIDTH=289 HEIGHT=121>
			<UL>
				<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><FONT FACE="Times New Roman, serif"><FONT SIZE=3>BIR
				2316</FONT></FONT></P>
				<LI><P ALIGN=JUSTIFY><FONT FACE="Times New Roman, serif"><FONT SIZE=3>Certificate
				of Employment (from previous company)</FONT></FONT></P>
			</UL>
		</TD>
		<TD WIDTH=267>
			<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in">
			to be submitted to the HR Department within  three (3) months</P>
			<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in"><BR>
			</P>
		</TD>
	</TR>
</TABLE>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in; line-height: 100%">
<BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in; line-height: 100%">
<BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in; line-height: 100%">
<BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in; line-height: 100%">
<BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in; line-height: 100%">
<BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in; line-height: 100%">
<BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in; line-height: 100%">
<BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in; line-height: 100%">
<BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in; line-height: 100%">
<BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in; line-height: 100%">
<BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in; line-height: 100%">
<BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in; line-height: 100%">
<BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in; line-height: 100%">
<BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in; line-height: 100%">
<BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in; line-height: 100%">
<BR>
</P>
<P CLASS="western" ALIGN=CENTER STYLE="margin-bottom: 0in; line-height: 100%">
<B>DRESS CODE POLICY</B></P>
<P CLASS="western" ALIGN=CENTER STYLE="margin-bottom: 0in; line-height: 100%">
<BR>
</P>
<CENTER>
	<TABLE WIDTH=430 BORDER=1 BORDERCOLOR="#00000a" CELLPADDING=7 CELLSPACING=0>
		<COL WIDTH=53>
		<COL WIDTH=204>
		<COL WIDTH=128>
		<TR VALIGN=TOP>
			<TD WIDTH=53 HEIGHT=8>
				<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in"><BR>
				</P>
			</TD>
			<TD WIDTH=204>
				<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in">
				<FONT FACE="Calibri, serif"><B>Release Date:</B></FONT></P>
				<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in"><FONT FACE="Calibri, serif">February
				2012</FONT></P>
			</TD>
			<TD WIDTH=128>
				<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in">
				<FONT FACE="Calibri, serif"><B>Review Date:</B></FONT></P>
				<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in"><FONT FACE="Calibri, serif"><B>June
				2013</B></FONT></P>
			</TD>
		</TR>
		<TR VALIGN=TOP>
			<TD WIDTH=53 HEIGHT=8>
				<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in">
				<FONT FACE="Calibri, serif"><B>Version:</B></FONT></P>
				<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in"><FONT FACE="Calibri, serif"><B>1.0</B></FONT></P>
			</TD>
			<TD WIDTH=204>
				<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in">
				<FONT FACE="Calibri, serif"><B>Process Owner:</B></FONT></P>
				<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in"><FONT FACE="Calibri, serif">Human
				Resource </FONT>
				</P>
			</TD>
			<TD WIDTH=128>
				<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in">
				<FONT FACE="Calibri, serif"><B>Process Administrator:</B></FONT></P>
				<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in"><FONT FACE="Calibri, serif">Supervisors/HOD/HR</FONT></P>
			</TD>
		</TR>
	</TABLE>
</CENTER>
<P CLASS="western" STYLE="margin-bottom: 0in; line-height: 100%"><BR>
</P>
<P CLASS="western" STYLE="margin-bottom: 0in; line-height: 100%"><U><B>Objective</B></U></P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0.02in; line-height: 100%">
It is management&rsquo;s intent that work attire should complement an
environment that reflects an efficient, orderly, and professionally
operated organization. This policy is intended to define appropriate
&ldquo;business attire&rdquo; and &ldquo;casual business attire&rdquo;.</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0.02in; line-height: 100%">
The Company recognizes the growing popularity of casual business
dress and the positive effects of this shift to boost employee morale
improve quality, encourage more open communication and increased
productivity, therefore, creating a more comfortable work
environment. Therefore, casual business attire will be permitted on
Fridays. The Company reserves the right to continue, extend, revise
or revoke this policy at its discretion.</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0.02in; line-height: 100%">
Enforcement of this guideline is the responsibility of Company
management and supervisory personnel.</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0.02in; line-height: 100%">
The key point to sustaining an appropriate causal business attire
program is the use of common sense and good judgment, and applying a
dress practice that the Company deems conducive to our business
environment. If you question the appropriateness of the attire, it
probably isn&rsquo;t appropriate.</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0.02in; line-height: 100%">
Requests for advice and assistance in administrating or interpreting
this guideline should be directed to immediate superior to be
escalated to HR Department if necessary.</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
<BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
<U><B>Appropriate Business Attire</B></U></P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
<BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
<FONT COLOR="#000000"><FONT FACE="Calibri, serif"><B>General Office
Staffs, Officers, Managers</B></FONT></FONT></P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
<BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
<FONT COLOR="#000000"><FONT FACE="Calibri, serif">Monday to Thursday:
	Corporate Attire </FONT></FONT>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
<FONT COLOR="#000000"><FONT FACE="Calibri, serif">Friday to
Sunday:	Casual Business Attire</FONT></FONT></P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
<BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
<FONT COLOR="#000000"><FONT FACE="Calibri, serif"><B>Operation Staffs</B></FONT></FONT></P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
<BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
<FONT COLOR="#000000"><FONT FACE="Calibri, serif">Monday to Sunday: 
	Casual Business Attire</FONT></FONT></P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
<BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
<BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
<BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
<BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0.02in; line-height: 100%">
<FONT COLOR="#000000"><SPAN LANG="en"><B>For Men: Tops</B></SPAN></FONT></P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.03in; margin-bottom: 0.03in; line-height: 100%">
<FONT COLOR="#000000"><FONT FACE="Tahoma, serif"><FONT SIZE=2><SPAN LANG="en">Smart
casual or business casual dress for men is a clean, ironed shirt with
a collar (like a polo or button down) and only a jacket if the
weather permits. Another thing to remember is that business casual
also usually means no tie.</SPAN></FONT></FONT></FONT></P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0.02in; line-height: 100%">
<FONT COLOR="#000000"><SPAN LANG="en"><B>For Men: Pants</B></SPAN></FONT></P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.03in; margin-bottom: 0.03in; line-height: 100%">
<FONT COLOR="#000000"><FONT FACE="Tahoma, serif"><FONT SIZE=2><SPAN LANG="en">Smart
casual pants for men should be either khakis or chinos that are
pressed. They can be in any color (as long as it&rsquo;s not too over
the top), but black or tan are the preferred colors. Jeans are
definitely not an option.</SPAN></FONT></FONT></FONT></P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0.02in; line-height: 100%">
<FONT COLOR="#000000"><SPAN LANG="en"><B>For Men: Shoes</B></SPAN></FONT></P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.03in; margin-bottom: 0.03in; line-height: 100%">
<FONT COLOR="#000000"><FONT FACE="Tahoma, serif"><FONT SIZE=2><SPAN LANG="en">Business
casual shoes for men are dress shoes, either brown or black but
sometimes grey. And remember to never wear tennis shoes.</SPAN></FONT></FONT></FONT></P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0.02in; line-height: 100%">
<FONT COLOR="#000000"><SPAN LANG="en"><B>For Women: Tops</B></SPAN></FONT></P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.03in; margin-bottom: 0.03in; line-height: 100%">
<FONT COLOR="#000000"><FONT FACE="Tahoma, serif"><FONT SIZE=2><SPAN LANG="en">Smart
or business casual dress for women is a little more flexible than for
men. Tops can include blouses, stylish knit tops, a nice sweater set,
or classic sleeveless tops with a cardigan or jacket.</SPAN></FONT></FONT></FONT></P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0.02in; line-height: 100%">
<FONT COLOR="#000000"><SPAN LANG="en"><B>For Women: Bottoms</B></SPAN></FONT></P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.03in; margin-bottom: 0.03in; line-height: 100%">
<FONT COLOR="#000000"><FONT FACE="Tahoma, serif"><FONT SIZE=2><SPAN LANG="en">When
choosing smart or business casual bottoms, women should wear khakis
or black dress pants, knee-length skirts, or pant suits. Again, jeans
are definitely not an option.</SPAN></FONT></FONT></FONT></P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0.02in; line-height: 100%">
<FONT COLOR="#000000"><SPAN LANG="en"><B>For Women: Shoes</B></SPAN></FONT></P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.03in; margin-bottom: 0.03in; line-height: 100%">
<FONT COLOR="#000000"><FONT FACE="Tahoma, serif"><FONT SIZE=2><SPAN LANG="en">For
shoes, women would do best to wear either dressy flats or mid to low
heels. Sometimes, chic boots can be worn as long as they have a
slight heel.</SPAN></FONT></FONT></FONT></P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0.02in; line-height: 100%">
<FONT COLOR="#000000"><SPAN LANG="en"><B>In Summary</B></SPAN></FONT></P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.03in; margin-bottom: 0.03in; line-height: 100%">
<FONT COLOR="#000000"><FONT FACE="Tahoma, serif"><FONT SIZE=2><SPAN LANG="en">The
thing to remember about business or smart casual is that it should be
modest and neat in appearance, but comfortable. And remember, this
dress style does not allow for tennis shoes (which includes Converse
style shoes) or jeans.</SPAN></FONT></FONT></FONT></P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.03in; margin-bottom: 0.03in; line-height: 100%">
<BR><BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.03in; margin-bottom: 0.03in; line-height: 100%">
<FONT COLOR="#000000"><SPAN LANG="en"><B>Inappropriate Attire</B></SPAN></FONT></P>
<P LANG="en" CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.03in; margin-bottom: 0.03in; line-height: 100%">
<BR><BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.03in; margin-bottom: 0.03in; line-height: 100%">
<FONT COLOR="#000000"><SPAN LANG="en">The following should be taken
into consideration when defining what is regarded as inappropriate
clothing for the workplace:</SPAN></FONT></P>
<P LANG="en" CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.03in; margin-bottom: 0.03in; line-height: 100%">
<BR><BR>
</P>
<UL>
	<LI><P ALIGN=JUSTIFY STYLE="margin-top: 0.03in; margin-bottom: 0.03in; line-height: 100%">
	<FONT COLOR="#000000"><SPAN LANG="en">sport related attire,
	including t-shirts/tops or ties with slogans relating to football
	teams or other club crests, would not be appropriate or could be
	construed as being offensive/inflammatory</SPAN></FONT></P>
	<LI><P ALIGN=JUSTIFY STYLE="margin-top: 0.03in; margin-bottom: 0.03in; line-height: 100%">
	<FONT COLOR="#000000"><SPAN LANG="en">Slogans or pictures on
	t-shirts/tops containing nudity or foul language, may be deemed,
	sexually offensive, and would not be appropriate.</SPAN></FONT></P>
	<LI><P ALIGN=JUSTIFY STYLE="margin-top: 0.03in; margin-bottom: 0.03in; line-height: 100%">
	<FONT COLOR="#000000"><SPAN LANG="en">revealing attire i.e. shorts
	(hot-pants/cut-off jeans/sports shorts are not acceptable), crop
	tops, clothes made of see through materials, and clothes that expose
	areas of the body usually covered in the workplace, may be deemed
	sexually offensive, and would not be appropriate.</SPAN></FONT></P>
	<LI><P ALIGN=JUSTIFY STYLE="margin-top: 0.03in; margin-bottom: 0.03in; line-height: 100%">
	Sandals (rubber or beach sandals)</P>
	<LI><P ALIGN=JUSTIFY STYLE="margin-top: 0.03in; margin-bottom: 0.03in; line-height: 100%">
	Sando/Spaghetti strap, tube or shirt without sleeves, shirt w/o
	collar 
	</P>
	<LI><P ALIGN=JUSTIFY STYLE="margin-top: 0.03in; margin-bottom: 0.03in; line-height: 100%">
	jeans, Capri pants and shorts</P>
	<LI><P ALIGN=JUSTIFY STYLE="margin-top: 0.03in; margin-bottom: 0.03in; line-height: 100%">
	sun glasses and cap 
	</P>
	<LI><P ALIGN=JUSTIFY STYLE="margin-top: 0.03in; margin-bottom: 0.03in; line-height: 100%">
	Rubber shoes.  
	</P>
	<LI><P ALIGN=JUSTIFY STYLE="margin-top: 0.03in; margin-bottom: 0.03in; line-height: 100%">
	Ear rings for male.</P>
	<LI><P ALIGN=JUSTIFY STYLE="margin-top: 0.03in; margin-bottom: 0.03in; line-height: 100%">
	<FONT COLOR="#000000"><SPAN LANG="en">Any articles of clothing or
	jewelry which may present a Health and Safety hazard for employees.</SPAN></FONT></P>
</UL>
<P LANG="en" CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.03in; margin-bottom: 0.03in; line-height: 100%">
<BR><BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.03in; margin-bottom: 0.03in; line-height: 100%">
<FONT COLOR="#000000"><SPAN LANG="en">These restrictions are in place
as some articles of clothing may be regarded as offensive to some
employees and be regarded as discriminatory in terms of sex or sexual
orientation, religious beliefs, racial or ethnic origins, or any
other discriminatory grounds, or which may cause health and safety
concerns.</SPAN></FONT></P>
<P CLASS="western" STYLE="margin-top: 0.02in; margin-bottom: 0.02in; line-height: 100%">
<U><B>Procedures</B></U></P>
<P CLASS="western" STYLE="margin-top: 0.02in; margin-bottom: 0.02in; line-height: 100%">
 Immediate superior/HOD is responsible for monitoring and enforcing
this policy. The policy will be administered according to the
following action steps:</P>
<P CLASS="western" STYLE="margin-top: 0.02in; margin-bottom: 0.02in; line-height: 100%">
1.&nbsp; &nbsp; If questionable attire is worn in the office, the
respective department supervisor/manager will hold a personal,
private discussion with the employee to advise and counsel the
employee regarding the inappropriateness of the attire. A CITE Form
for Verbal Counseling should be issued and a Coaching Log should be
made.</P>
<P CLASS="western" STYLE="margin-top: 0.02in; margin-bottom: 0.02in; line-height: 100%">
2.&nbsp; &nbsp; If an obvious policy violation occurs, the department
supervisor/manager will hold a private discussion with the employee
and ask the employee to go home and change his/her attire
immediately.</P>
<P CLASS="western" STYLE="margin-top: 0.02in; margin-bottom: 0.02in; line-height: 100%">
3.&nbsp; &nbsp; Repeated policy violations will result in
disciplinary action, up to and including termination.</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in; line-height: 100%">
<BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in; line-height: 100%">
<BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in; line-height: 100%">
<BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in; line-height: 100%">
<BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in; line-height: 100%">
<BR>
</P>
<P CLASS="western" ALIGN=CENTER STYLE="margin-bottom: 0in; line-height: 100%">
<B>ATTENDANCE POLICY</B></P>
<P CLASS="western" ALIGN=CENTER STYLE="margin-bottom: 0in; line-height: 100%">
<BR>
</P>
<CENTER>
	<TABLE WIDTH=430 BORDER=1 BORDERCOLOR="#00000a" CELLPADDING=7 CELLSPACING=0>
		<COL WIDTH=53>
		<COL WIDTH=204>
		<COL WIDTH=128>
		<TR VALIGN=TOP>
			<TD WIDTH=53 HEIGHT=8>
				<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in"><BR>
				</P>
			</TD>
			<TD WIDTH=204>
				<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in">
				<FONT FACE="Calibri, serif"><B>Release Date:</B></FONT></P>
				<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in"><FONT FACE="Calibri, serif"><B>February
				2012</B></FONT></P>
			</TD>
			<TD WIDTH=128>
				<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in">
				<FONT FACE="Calibri, serif"><B>Review Date:</B></FONT></P>
				<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in"><FONT FACE="Calibri, serif"><B>June
				2013</B></FONT></P>
			</TD>
		</TR>
		<TR VALIGN=TOP>
			<TD WIDTH=53 HEIGHT=8>
				<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in">
				<FONT FACE="Calibri, serif"><B>Version:</B></FONT></P>
				<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in"><FONT FACE="Calibri, serif"><B>1.0</B></FONT></P>
			</TD>
			<TD WIDTH=204>
				<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in">
				<FONT FACE="Calibri, serif"><B>Process Owner:</B></FONT></P>
				<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in"><FONT FACE="Calibri, serif">Human
				Resource </FONT>
				</P>
			</TD>
			<TD WIDTH=128>
				<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in">
				<FONT FACE="Calibri, serif"><B>Process Administrator:</B></FONT></P>
				<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in"><FONT FACE="Calibri, serif">Supervisors/HOD/HR</FONT></P>
			</TD>
		</TR>
	</TABLE>
</CENTER>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
<BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
<BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
<U><B>Purpose </B></U>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
&nbsp;</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
The purpose of this Policy is to set forth attendance expectations
and to establish standards for employee attendance and punctuality.</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
<BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
<U><B>Scope</B></U></P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
<BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
All Pacific Sea BPO Services Inc. employees. Every employee, as a
condition of employment, accepts the responsibility to report to work
promptly every day that he/she is scheduled to work and to maintain a
satisfactory record of attendance. Unscheduled time-off is
unacceptable and should be avoided.</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
<BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
<U><B>Policy</B></U></P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
<BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
<B>I. Tardiness</B> &ndash; Failure to report to work at the
prescribed time. Any of the following shall constitute an offense on
habitual tardiness:</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.5in; margin-bottom: 0in; line-height: 100%">
a. At least two (2) times tardy within 1 week period (Monday-Sunday)</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.5in; margin-bottom: 0in; line-height: 100%">
B. Four (4) times or more tardiness within a month</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.5in; margin-bottom: 0in; line-height: 100%">
c. Aggregated tardiness of one (1) hour or more within a 1 month
period</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
<B>Tardiness Penalty</B></P>
<TABLE WIDTH=634 BORDER=1 BORDERCOLOR="#000001" CELLPADDING=4 CELLSPACING=0>
	<COL WIDTH=308>
	<COL WIDTH=308>
	<TR VALIGN=TOP>
		<TD WIDTH=308 HEIGHT=14>
			<P CLASS="western" ALIGN=JUSTIFY>1st Infraction</P>
		</TD>
		<TD WIDTH=308>
			<P CLASS="western" ALIGN=JUSTIFY>Verbal Counseling (Documented) *</P>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD WIDTH=308 HEIGHT=15>
			<P CLASS="western" ALIGN=JUSTIFY>2nd Infraction</P>
		</TD>
		<TD WIDTH=308>
			<P CLASS="western" ALIGN=JUSTIFY>Written Reprimand/Warning *</P>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD WIDTH=308 HEIGHT=15>
			<P CLASS="western" ALIGN=JUSTIFY>3rd Infraction</P>
		</TD>
		<TD WIDTH=308>
			<P CLASS="western" ALIGN=JUSTIFY>First Suspension (3 days) *</P>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD WIDTH=308 HEIGHT=15>
			<P CLASS="western" ALIGN=JUSTIFY>4th Infraction</P>
		</TD>
		<TD WIDTH=308>
			<P CLASS="western" ALIGN=JUSTIFY>Second Suspension ( 10 days) *</P>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD WIDTH=308 HEIGHT=15>
			<P CLASS="western" ALIGN=JUSTIFY>5th Infraction 
			</P>
		</TD>
		<TD WIDTH=308>
			<P CLASS="western" ALIGN=JUSTIFY>Third Suspension ( 15 days) *</P>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD WIDTH=308 HEIGHT=14>
			<P CLASS="western" ALIGN=JUSTIFY>6th Infraction 
			</P>
		</TD>
		<TD WIDTH=308>
			<P CLASS="western" ALIGN=JUSTIFY>Dismissal *</P>
		</TD>
	</TR>
</TABLE>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
Note: * Shall require a letter of explanation from employee 
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
There shall be no grace period.</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
The cleansing period is for one (1) year &ndash; every end of
December</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
<BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
<B>II. Undertime</B> &ndash; Failure to complete the given 8 hours of
work. 
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.5in; margin-bottom: 0in; line-height: 100%">
a. At least two (2) times under time within a month 
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.5in; margin-bottom: 0in; line-height: 100%">
b Aggregated under time of at least one (1) hour within a 1 month
period.</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
<BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
<B>Undertime Penalty</B></P>
<TABLE WIDTH=634 BORDER=1 BORDERCOLOR="#000001" CELLPADDING=4 CELLSPACING=0>
	<COL WIDTH=308>
	<COL WIDTH=308>
	<TR VALIGN=TOP>
		<TD WIDTH=308 HEIGHT=14>
			<P CLASS="western" ALIGN=JUSTIFY>1st Infraction</P>
		</TD>
		<TD WIDTH=308>
			<P CLASS="western" ALIGN=JUSTIFY>Verbal Counseling (Documented) *</P>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD WIDTH=308 HEIGHT=15>
			<P CLASS="western" ALIGN=JUSTIFY>2nd Infraction</P>
		</TD>
		<TD WIDTH=308>
			<P CLASS="western" ALIGN=JUSTIFY>Written Reprimand/Warning *</P>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD WIDTH=308 HEIGHT=15>
			<P CLASS="western" ALIGN=JUSTIFY>3rd Infraction</P>
		</TD>
		<TD WIDTH=308>
			<P CLASS="western" ALIGN=JUSTIFY>First Suspension (3 days) *</P>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD WIDTH=308 HEIGHT=15>
			<P CLASS="western" ALIGN=JUSTIFY>4th Infraction</P>
		</TD>
		<TD WIDTH=308>
			<P CLASS="western" ALIGN=JUSTIFY>Second Suspension ( 10 days) *</P>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD WIDTH=308 HEIGHT=15>
			<P CLASS="western" ALIGN=JUSTIFY>5th Infraction 
			</P>
		</TD>
		<TD WIDTH=308>
			<P CLASS="western" ALIGN=JUSTIFY>Third Suspension ( 15 days) *</P>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD WIDTH=308 HEIGHT=14>
			<P CLASS="western" ALIGN=JUSTIFY>6th Infraction 
			</P>
		</TD>
		<TD WIDTH=308>
			<P CLASS="western" ALIGN=JUSTIFY>Dismissal *</P>
		</TD>
	</TR>
</TABLE>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
Every undertime shall correspond to deduction of Meal Allowance</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
The cleansing period is for one (1) year &ndash; every end of
December</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
<BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
<B>III. Overbreak</B>&ndash; Exceeding the given breaks/lunch breaks
provided by the company.</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.5in; margin-bottom: 0in; line-height: 100%">
a. Excess of 5 minutes over break within a given schedule</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.5in; margin-bottom: 0in; line-height: 100%">
b At least two (2) times over break within a month 
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
<B>Overbreak Penalty</B></P>
<TABLE WIDTH=634 BORDER=1 BORDERCOLOR="#000001" CELLPADDING=4 CELLSPACING=0>
	<COL WIDTH=308>
	<COL WIDTH=308>
	<TR VALIGN=TOP>
		<TD WIDTH=308 HEIGHT=14>
			<P CLASS="western" ALIGN=JUSTIFY>1st Infraction</P>
		</TD>
		<TD WIDTH=308>
			<P CLASS="western" ALIGN=JUSTIFY>Verbal Counseling (Documented)</P>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD WIDTH=308 HEIGHT=15>
			<P CLASS="western" ALIGN=JUSTIFY>2nd Infraction</P>
		</TD>
		<TD WIDTH=308>
			<P CLASS="western" ALIGN=JUSTIFY>Written Reprimand/Warning *</P>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD WIDTH=308 HEIGHT=15>
			<P CLASS="western" ALIGN=JUSTIFY>3rd Infraction</P>
		</TD>
		<TD WIDTH=308>
			<P CLASS="western" ALIGN=JUSTIFY>First Suspension (3 days) *</P>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD WIDTH=308 HEIGHT=15>
			<P CLASS="western" ALIGN=JUSTIFY>4th Infraction</P>
		</TD>
		<TD WIDTH=308>
			<P CLASS="western" ALIGN=JUSTIFY>Second Suspension ( 10 days) *</P>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD WIDTH=308 HEIGHT=15>
			<P CLASS="western" ALIGN=JUSTIFY>5th Infraction 
			</P>
		</TD>
		<TD WIDTH=308>
			<P CLASS="western" ALIGN=JUSTIFY>Third Suspension ( 15 days) *</P>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD WIDTH=308 HEIGHT=14>
			<P CLASS="western" ALIGN=JUSTIFY>6th Infraction 
			</P>
		</TD>
		<TD WIDTH=308>
			<P CLASS="western" ALIGN=JUSTIFY>Dismissal *</P>
		</TD>
	</TR>
</TABLE>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
The cleansing period is for one (1) year &ndash; every end of
December</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
<BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
<B>WORK ATTENDANCE</B></P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
Company provided leaves/absences for Local Staff: 
</P>
<TABLE WIDTH=667 BORDER=1 BORDERCOLOR="#00000a" CELLPADDING=7 CELLSPACING=0>
	<COL WIDTH=64>
	<COL WIDTH=106>
	<COL WIDTH=214>
	<COL WIDTH=94>
	<COL WIDTH=117>
	<TR VALIGN=TOP>
		<TD WIDTH=64 HEIGHT=19>
			<P CLASS="western" ALIGN=JUSTIFY><B>Nature</B></P>
		</TD>
		<TD WIDTH=106>
			<P CLASS="western" ALIGN=JUSTIFY><B>Coverage</B></P>
		</TD>
		<TD WIDTH=214>
			<P CLASS="western" ALIGN=JUSTIFY><B>Requirement </B>
			</P>
		</TD>
		<TD WIDTH=94>
			<P CLASS="western" ALIGN=JUSTIFY><B>Allotted Days</B></P>
		</TD>
		<TD WIDTH=117>
			<P CLASS="western" ALIGN=JUSTIFY><B>Cash Conversion</B></P>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD WIDTH=64 HEIGHT=20>
			<P CLASS="western" ALIGN=JUSTIFY>Unpaid Absences</P>
		</TD>
		<TD WIDTH=106>
			<P CLASS="western" ALIGN=JUSTIFY>All Probationary Employees</P>
		</TD>
		<TD WIDTH=214>
			<P CLASS="western" ALIGN=JUSTIFY>Notification of at least 1hr to
			supervisor or HR for absences due to sickness; Approval for 3
			working days for vacations</P>
		</TD>
		<TD WIDTH=94>
			<P CLASS="western" ALIGN=JUSTIFY>5 unpaid days within the six
			months of employment</P>
		</TD>
		<TD WIDTH=117>
			<P CLASS="western">No cash conversion</P>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD WIDTH=64 HEIGHT=20>
			<P CLASS="western" ALIGN=JUSTIFY>Vacation Leave</P>
		</TD>
		<TD WIDTH=106>
			<P CLASS="western" ALIGN=JUSTIFY>Regular employees</P>
		</TD>
		<TD WIDTH=214>
			<P CLASS="western" ALIGN=JUSTIFY>See Leave Policy</P>
		</TD>
		<TD WIDTH=94>
			<P CLASS="western" ALIGN=JUSTIFY>10 days within the year/ 1 VL per
			month</P>
		</TD>
		<TD WIDTH=117>
			<P CLASS="western">5 day/half cash conversion on June</P>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD WIDTH=64 HEIGHT=20>
			<P CLASS="western" ALIGN=JUSTIFY>Sick Leave</P>
		</TD>
		<TD WIDTH=106>
			<P CLASS="western" ALIGN=JUSTIFY>Regular employees</P>
		</TD>
		<TD WIDTH=214>
			<P CLASS="western" ALIGN=JUSTIFY>Submission of Medical Certificate
			upon report for work</P>
		</TD>
		<TD WIDTH=94>
			<P CLASS="western" ALIGN=JUSTIFY>10 days within the year</P>
		</TD>
		<TD WIDTH=117>
			<P CLASS="western">5 day/half cash conversion on June</P>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD WIDTH=64 HEIGHT=20>
			<P CLASS="western" ALIGN=JUSTIFY>Maternity Leave</P>
		</TD>
		<TD WIDTH=106>
			<P CLASS="western">Female employee with at least 3 mos.
			contribution ; Within first 4 delivery&amp; miscarriage;</P>
		</TD>
		<TD WIDTH=214>
			<P CLASS="western">Proper notification with a certificate from a
			registered medical practitioner; A birth certificate must be
			presented duly signed by physician/midwife to be submitted to HR
			within one month of delivery/miscarriage;</P>
		</TD>
		<TD WIDTH=94>
			<P CLASS="western" STYLE="margin-bottom: 0in"><B>60 day</B>s &ndash;
			normal delivery/ miscarriage</P>
			<P CLASS="western"><B>78 days</B>- caesarian section delivery</P>
		</TD>
		<TD WIDTH=117>
			<P CLASS="western">No cash conversion</P>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD WIDTH=64 HEIGHT=20>
			<P CLASS="western" ALIGN=JUSTIFY>Paternity Leave</P>
		</TD>
		<TD WIDTH=106>
			<P CLASS="western" ALIGN=JUSTIFY>Married male employees within
			first 4 delivery/ miscarriage</P>
		</TD>
		<TD WIDTH=214>
			<P CLASS="western" ALIGN=JUSTIFY>Proper notification with marriage
			certificate; A birth certificate must be presented duly signed by
			physician/midwife to be submitted to HR within 1 month of
			delivery/miscarriage;</P>
		</TD>
		<TD WIDTH=94>
			<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in">7
			working days</P>
			<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><BR>
			</P>
			<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><BR>
			</P>
			<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><BR>
			</P>
			<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><BR>
			</P>
			<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><BR>
			</P>
			<P CLASS="western" ALIGN=JUSTIFY> 
			</P>
		</TD>
		<TD WIDTH=117>
			<P CLASS="western">No cash conversion</P>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD WIDTH=64 HEIGHT=20>
			<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in">Compassionate
			Leave</P>
			<P CLASS="western" ALIGN=JUSTIFY><BR>
			</P>
		</TD>
		<TD WIDTH=106>
			<P CLASS="western" ALIGN=JUSTIFY>All employees whose immediate
			family has died</P>
		</TD>
		<TD WIDTH=214>
			<P CLASS="western" ALIGN=JUSTIFY>Employee must present a copy of
			the relatives death certificate</P>
		</TD>
		<TD WIDTH=94>
			<P CLASS="western" ALIGN=JUSTIFY>3 days</P>
		</TD>
		<TD WIDTH=117>
			<P CLASS="western">No cash conversion</P>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD WIDTH=64 HEIGHT=20>
			<P CLASS="western" ALIGN=JUSTIFY>Marriage Leave</P>
		</TD>
		<TD WIDTH=106>
			<P CLASS="western" ALIGN=JUSTIFY>At least one year tenured
			employees</P>
		</TD>
		<TD WIDTH=214>
			<P CLASS="western" ALIGN=JUSTIFY>Marriage application within 3
			months ; Marriage certificate</P>
		</TD>
		<TD WIDTH=94>
			<P CLASS="western" ALIGN=JUSTIFY>3 days</P>
		</TD>
		<TD WIDTH=117>
			<P CLASS="western">No cash conversion</P>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD WIDTH=64 HEIGHT=20>
			<P CLASS="western" ALIGN=JUSTIFY>Solo Parent Leave</P>
		</TD>
		<TD WIDTH=106>
			<P CLASS="western" ALIGN=JUSTIFY>At least one year tenured
			employees</P>
		</TD>
		<TD WIDTH=214>
			<P CLASS="western" ALIGN=JUSTIFY>Employee must present a Solo
			Parent ID issued by DSWD. VALID and existing ID.</P>
		</TD>
		<TD WIDTH=94>
			<P CLASS="western" ALIGN=JUSTIFY>7 working days within the year</P>
		</TD>
		<TD WIDTH=117>
			<P CLASS="western">No cash conversion</P>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD WIDTH=64 HEIGHT=19>
			<P CLASS="western" ALIGN=JUSTIFY>Battered Woman Leave</P>
		</TD>
		<TD WIDTH=106>
			<P CLASS="western" ALIGN=JUSTIFY>Female employees 
			</P>
		</TD>
		<TD WIDTH=214>
			<P CLASS="western" ALIGN=JUSTIFY>Present a certification from
			Punong Barangay from where she is residing or from the prosecutor
			clerk of court</P>
		</TD>
		<TD WIDTH=94>
			<P CLASS="western" ALIGN=JUSTIFY>10 days leave</P>
		</TD>
		<TD WIDTH=117>
			<P CLASS="western">No cash conversion</P>
		</TD>
	</TR>
</TABLE>
<P ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in"><FONT FACE="Calibri, serif"><FONT SIZE=2 STYLE="font-size: 11pt">Company
provided leaves/absences for Expat Staff: </FONT></FONT>
</P>
<TABLE WIDTH=670 BORDER=1 BORDERCOLOR="#00000a" CELLPADDING=7 CELLSPACING=0>
	<COL WIDTH=100>
	<COL WIDTH=94>
	<COL WIDTH=165>
	<COL WIDTH=120>
	<COL WIDTH=119>
	<TR VALIGN=TOP>
		<TD WIDTH=100 HEIGHT=73>
			<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in"><B>Nature</B></P>
		</TD>
		<TD WIDTH=94>
			<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in"><B>Coverage</B></P>
		</TD>
		<TD WIDTH=165>
			<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in"><B>Requirement
			</B>
			</P>
		</TD>
		<TD WIDTH=120>
			<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in"><B>Allotted
			Days</B></P>
		</TD>
		<TD WIDTH=119>
			<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in"><B>Cash
			Conversion</B></P>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD WIDTH=100 HEIGHT=74>
			<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in">Annual
			Leave</P>
		</TD>
		<TD WIDTH=94>
			<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in">All
			confirmed employees</P>
		</TD>
		<TD WIDTH=165>
			<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in">7 days
			notification for Home Vacation Leave; Medical Certificate for Sick
			Leave</P>
		</TD>
		<TD WIDTH=120>
			<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in">42
			days; 
			</P>
		</TD>
		<TD WIDTH=119>
			<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in">Cash
			conversion of half or 21 on June 
			</P>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD WIDTH=100 HEIGHT=74>
			<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in">Compassionate
			Leave</P>
		</TD>
		<TD WIDTH=94>
			<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in">All
			expats</P>
		</TD>
		<TD WIDTH=165>
			<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in">DeathCertificate
			/To return homecountry                    <B>Single </B>- 
			Parents, Siblings, Grandmother /Grandfather  <B>Married</B>-
			(additional) Inlaws &ndash; Parents, Grandparents, Siblings</P>
		</TD>
		<TD WIDTH=120>
			<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in">3 days</P>
		</TD>
		<TD WIDTH=119>
			<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in">No
			Cash conversion</P>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD WIDTH=100 HEIGHT=74>
			<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in">Medical
			Leave</P>
		</TD>
		<TD WIDTH=94>
			<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in">All
			confirmed employees</P>
		</TD>
		<TD WIDTH=165>
			<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in">Employees
			must be under hospital confinement or had operations  that would
			result to confinement; 
			</P>
		</TD>
		<TD WIDTH=120>
			<P CLASS="western" STYLE="margin-top: 0.02in">30 days ; 
			</P>
		</TD>
		<TD WIDTH=119>
			<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in">No
			Cash conversion</P>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD WIDTH=100 HEIGHT=73>
			<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in">Maternity
			Leave</P>
		</TD>
		<TD WIDTH=94>
			<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in">At
			least one year tenured female married employees 
			</P>
		</TD>
		<TD WIDTH=165>
			<P CLASS="western" STYLE="margin-top: 0.02in">Proper notification
			with a certificate from a registered medical practitioner; A birth
			certificate must be presented duly signed by physician/midwife to
			be submitted to HR within one month of delivery/miscarriage;</P>
		</TD>
		<TD WIDTH=120>
			<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in">60
			days</P>
		</TD>
		<TD WIDTH=119>
			<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in">No
			Cash conversion</P>
		</TD>
	</TR>
</TABLE>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
<BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
<BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
<B>I. Excessive Absences</B> - issued to employees who exceed the
allowable unpaid/Emergency Leave for the year.</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.5in; margin-bottom: 0in; line-height: 100%">
a. Excess of 5 Unpaid leaves for probationary employees</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.5in; margin-bottom: 0in; line-height: 100%">
b. Excess of allotted leaves (Annual Leave , SL or VL) for Expat and
Regular local employees</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
<BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
<B>Excessive Absence Penalty</B></P>
<TABLE WIDTH=634 BORDER=1 BORDERCOLOR="#000001" CELLPADDING=4 CELLSPACING=0>
	<COL WIDTH=308>
	<COL WIDTH=308>
	<TR VALIGN=TOP>
		<TD WIDTH=308 HEIGHT=79>
			<P CLASS="western" ALIGN=JUSTIFY>1st Infraction</P>
		</TD>
		<TD WIDTH=308>
			<P CLASS="western" ALIGN=JUSTIFY>Verbal Counseling (Documented)</P>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD WIDTH=308 HEIGHT=80>
			<P CLASS="western" ALIGN=JUSTIFY>2nd Infraction</P>
		</TD>
		<TD WIDTH=308>
			<P CLASS="western" ALIGN=JUSTIFY>Written Reprimand/Warning *</P>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD WIDTH=308 HEIGHT=80>
			<P CLASS="western" ALIGN=JUSTIFY>3rd Infraction</P>
		</TD>
		<TD WIDTH=308>
			<P CLASS="western" ALIGN=JUSTIFY>First Suspension (3 days) *</P>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD WIDTH=308 HEIGHT=80>
			<P CLASS="western" ALIGN=JUSTIFY>4th Infraction</P>
		</TD>
		<TD WIDTH=308>
			<P CLASS="western" ALIGN=JUSTIFY>Second Suspension ( 10 days)*</P>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD WIDTH=308 HEIGHT=80>
			<P CLASS="western" ALIGN=JUSTIFY>5th Infraction 
			</P>
		</TD>
		<TD WIDTH=308>
			<P CLASS="western" ALIGN=JUSTIFY>Third Suspension ( 15 days) *</P>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD WIDTH=308 HEIGHT=79>
			<P CLASS="western" ALIGN=JUSTIFY>6th Infraction 
			</P>
		</TD>
		<TD WIDTH=308>
			<P CLASS="western" ALIGN=JUSTIFY>Dismissal *</P>
		</TD>
	</TR>
</TABLE>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
The cleansing period is for one (1) year &ndash; every end of June</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
<BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
<BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
<B>II. Failure to submit Proper Documentation</B> &ndash; Should the
leave require documents/certificates for justification of his leave,
it is the duty of the employee to submit the requirements on the
prescribed time. 
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.5in; margin-bottom: 0in; line-height: 100%">
<B>a. Sick Leave</B> &ndash; submission of Medical Certificate
immediately upon report for work. This is also important if the
person who is sick harbors grave or contagious disease which may be
harmful to self and other employees. 
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.5in; margin-bottom: 0in; line-height: 100%">
<B>b. Maternity Leave</B> &ndash; submission of Birth Certificate or
supporting Medical Document within thirty (30) days of birth or
miscarriage. 
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.5in; margin-bottom: 0in; line-height: 100%">
<B>c. Paternity Leave</B> - submission of Birth Certificate or
supporting Medical Document within thirty (30) days of birth or
miscarriage.</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.5in; margin-bottom: 0in; line-height: 100%">
<B>d. Compassionate Leave</B> &ndash; submission of Death Certificate
of relative within thirty (30) days after leave application date. 
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.5in; margin-bottom: 0in; line-height: 100%">
<B>e. Marriage Leave</B> - submission of Marriage Certificate of
relative within thirty (30) days after leave application date</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.5in; margin-bottom: 0in; line-height: 100%">
<B>f. Solo Parent Leave</B> &ndash; presentation of Solo Parent ID
from DSWD before leave. This leave shall not be recognized if the
requirement is not given to HR beforehand. 
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.5in; margin-bottom: 0in; line-height: 100%">
<B>g. Battered Woman Leave</B> &ndash; presentation of certification
from Punong Barangay or prosecutor clerk of court before leave. This
leave shall not be recognized if the requirement is not given to HR
beforehand. 
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
<BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
<BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
<BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
<BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
<B>Failure to submit Proper Documentation</B></P>
<TABLE WIDTH=634 BORDER=1 BORDERCOLOR="#000001" CELLPADDING=4 CELLSPACING=0>
	<COL WIDTH=308>
	<COL WIDTH=308>
	<TR VALIGN=TOP>
		<TD WIDTH=308 HEIGHT=79>
			<P CLASS="western" ALIGN=JUSTIFY>1st Infraction</P>
		</TD>
		<TD WIDTH=308>
			<P CLASS="western" ALIGN=JUSTIFY>Verbal Counseling (Documented)</P>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD WIDTH=308 HEIGHT=80>
			<P CLASS="western" ALIGN=JUSTIFY>2nd Infraction</P>
		</TD>
		<TD WIDTH=308>
			<P CLASS="western" ALIGN=JUSTIFY>Written Reprimand/Warning *</P>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD WIDTH=308 HEIGHT=80>
			<P CLASS="western" ALIGN=JUSTIFY>3rd Infraction</P>
		</TD>
		<TD WIDTH=308>
			<P CLASS="western" ALIGN=JUSTIFY>First Suspension (3 days) *</P>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD WIDTH=308 HEIGHT=80>
			<P CLASS="western" ALIGN=JUSTIFY>4th Infraction</P>
		</TD>
		<TD WIDTH=308>
			<P CLASS="western" ALIGN=JUSTIFY>Second Suspension ( 10 days)*</P>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD WIDTH=308 HEIGHT=80>
			<P CLASS="western" ALIGN=JUSTIFY>5th Infraction 
			</P>
		</TD>
		<TD WIDTH=308>
			<P CLASS="western" ALIGN=JUSTIFY>Third Suspension ( 15 days) *</P>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD WIDTH=308 HEIGHT=79>
			<P CLASS="western" ALIGN=JUSTIFY>6th Infraction 
			</P>
		</TD>
		<TD WIDTH=308>
			<P CLASS="western" ALIGN=JUSTIFY>Dismissal *</P>
		</TD>
	</TR>
</TABLE>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
1. The cleansing period is for one (1) year &ndash; every end of June</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
<BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
<B>III. Absence Without Official Leave (AWOL)</B> &ndash;
unauthorized or unexcused absence from work 
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.5in; margin-bottom: 0in; line-height: 100%">
a. Absences without approved application for Leave of Absence 
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.5in; margin-bottom: 0in; line-height: 100%">
b. Extending previously approved VL or SL without prior notice</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.5in; margin-bottom: 0in; line-height: 100%">
c. Failure to notify office of at least 1 hour before scheduled duty
for emergency cases or Sick Leave to HR Department or Supervisor. No
Leave Form shall be required or approved should employee fail to
notify ahead. 
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.5in; margin-bottom: 0in; line-height: 100%">
d. Failure to report for work as ordered, after having been AWOL</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.5in; margin-bottom: 0in; line-height: 100%">
e. Failure to report for work for a date that has been announced by
management as 'Critical Work Day</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
<BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
<B>AWOL Penalty </B>
</P>
<TABLE WIDTH=666 BORDER=1 BORDERCOLOR="#000001" CELLPADDING=4 CELLSPACING=0>
	<COL WIDTH=155>
	<COL WIDTH=253>
	<COL WIDTH=231>
	<TR VALIGN=TOP>
		<TD WIDTH=155 HEIGHT=11>
			<P CLASS="western" ALIGN=JUSTIFY>Frequency</P>
		</TD>
		<TD WIDTH=253>
			<P CLASS="western" ALIGN=JUSTIFY>Less than 3 Consecutive Days</P>
		</TD>
		<TD WIDTH=231>
			<P CLASS="western" ALIGN=JUSTIFY>3 or More Consecutive Days ;</P>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD WIDTH=155 HEIGHT=12>
			<P CLASS="western" ALIGN=JUSTIFY>1st Infraction</P>
		</TD>
		<TD WIDTH=253>
			<P CLASS="western" ALIGN=JUSTIFY>Verbal Counseling (Documented)</P>
		</TD>
		<TD WIDTH=231>
			<P CLASS="western" ALIGN=JUSTIFY>Final Warning*</P>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD WIDTH=155 HEIGHT=12>
			<P CLASS="western" ALIGN=JUSTIFY>2nd Infraction</P>
		</TD>
		<TD WIDTH=253>
			<P CLASS="western" ALIGN=JUSTIFY>Written Reprimand/Warning *</P>
		</TD>
		<TD WIDTH=231>
			<P CLASS="western" ALIGN=JUSTIFY>Suspension (10 Days) *</P>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD WIDTH=155 HEIGHT=12>
			<P CLASS="western" ALIGN=JUSTIFY>3rd Infraction</P>
		</TD>
		<TD WIDTH=253>
			<P CLASS="western" ALIGN=JUSTIFY>First Suspension (3 days) *</P>
		</TD>
		<TD WIDTH=231>
			<P CLASS="western" ALIGN=JUSTIFY>Dismissal *</P>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD WIDTH=155 HEIGHT=12>
			<P CLASS="western" ALIGN=JUSTIFY>4th Infraction</P>
		</TD>
		<TD WIDTH=253>
			<P CLASS="western" ALIGN=JUSTIFY>Second Suspension ( 10 days)*</P>
		</TD>
		<TD WIDTH=231>
			<P CLASS="western" ALIGN=JUSTIFY><BR>
			</P>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD WIDTH=155 HEIGHT=12>
			<P CLASS="western" ALIGN=JUSTIFY>5th Infraction 
			</P>
		</TD>
		<TD WIDTH=253>
			<P CLASS="western" ALIGN=JUSTIFY>Third Suspension ( 15 days) *</P>
		</TD>
		<TD WIDTH=231>
			<P CLASS="western" ALIGN=JUSTIFY><BR>
			</P>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD WIDTH=155 HEIGHT=11>
			<P CLASS="western" ALIGN=JUSTIFY>6th Infraction 
			</P>
		</TD>
		<TD WIDTH=253>
			<P CLASS="western" ALIGN=JUSTIFY>Dismissal *</P>
		</TD>
		<TD WIDTH=231>
			<P CLASS="western" ALIGN=JUSTIFY><BR>
			</P>
		</TD>
	</TR>
</TABLE>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
The cleansing period is for two (2) years &ndash; every end of June 
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
<BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
<B>III. Abandonment of Post -</B> to constitute abandonment, two
elements must concur:</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.5in; margin-bottom: 0in; line-height: 100%">
(1) The failure to report for work or absence without valid or
justifiable reason,</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.5in; margin-bottom: 0in; line-height: 100%">
(2) A clear intention to sever the employer-employee relationship. 
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.5in; margin-bottom: 0in; line-height: 100%">
<BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
Process for Abandonment of Post - 7 days and more consecutive AWOL of
employee may be tagged as Abandonment of Post which shall be ground
for dismissal. 
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.5in; margin-bottom: 0in; line-height: 100%">
a. After the 3rd day of AWOL, HR shall submit a Return To Work Order
(RTWO) to employee's last known address via Registered Mail. A
deadline to report to work (a week after) shall be given and a letter
of explanation shall be required.</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.5in; margin-bottom: 0in; line-height: 100%">
b. Another RTWO shall be issued to employee should he/she fail to
come to work (a week after). Failure to report shall result to being
issued a Termination Letter. 
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.5in; margin-bottom: 0in; line-height: 100%">
c. A Termination Letter due to Abandonment of Post will be issued to
employee</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
<BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
<B>OTHERS</B></P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
<BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
<B>I. Time Record and Amendment</B></P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
Employees are solely responsible for their time record. Employees are
to ensure that their attendance is properly recorded as it would be
the basis for their payroll. 
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
<BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.5in; margin-bottom: 0in; line-height: 100%">
a. The HR department shall solely base the employee attendance on
access control log record</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.5in; margin-bottom: 0in; line-height: 100%">
b. Employees are to make sure that that their logs are recorded in
Nexus log in. 
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.5in; margin-bottom: 0in; line-height: 100%">
c. For any missing log-ins, they are to submit a Time Amendment form
to HR within three (3) days from the date of the missing log/s.</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.5in; margin-bottom: 0in; line-height: 100%">
<BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.5in; margin-bottom: 0in; line-height: 100%">
<BR>
</P>
<TABLE WIDTH=634 BORDER=1 BORDERCOLOR="#000001" CELLPADDING=4 CELLSPACING=0>
	<COL WIDTH=308>
	<COL WIDTH=308>
	<TR VALIGN=TOP>
		<TD WIDTH=308 HEIGHT=6>
			<P CLASS="western" ALIGN=JUSTIFY>1st Infraction</P>
		</TD>
		<TD WIDTH=308>
			<P CLASS="western" ALIGN=JUSTIFY>Written Warning ( Logs from
			manual are based for attendance)*</P>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD WIDTH=308 HEIGHT=6>
			<P CLASS="western" ALIGN=JUSTIFY>2nd Infraction</P>
		</TD>
		<TD WIDTH=308>
			<P CLASS="western" ALIGN=JUSTIFY>No Payment on 2 missing logs /
			Half day payment on 1 missing log*</P>
		</TD>
	</TR>
</TABLE>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
Note: * Shall require a letter of explanation from employee 
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
<BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in; line-height: 100%">
Failure of an employee to record his log in and out of the <FONT FACE="Calibri, serif">attendance
record will be dealt with accordingly. In addition a fine will be
imposed and will be deducted from meal allowance to be determined by
the management. </FONT>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
<BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
<BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
<B>II. Overtime-</B>refers to additional compensation for work
performed beyond eight (8) hours a day.</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.5in; margin-bottom: 0in; line-height: 100%">
a. Employee must submit the Overtime Request Form prior to effective
date. Overtime application after overtime work shall be nullified
unless with strong justifiable reason.</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.5in; margin-bottom: 0in; line-height: 100%">
b. Overtime will only be paid for periods of more than one (1) hour
in any day.</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.5in; margin-bottom: 0in; line-height: 100%">
c. Overtime should be done sparingly and with justifiable cause.
Excessive Overtime Request shall result in management to question the
approving manager/supervisor on his/her subordinate work allocation
and planning. 
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.5in; margin-bottom: 0in; line-height: 100%">
d. OT Hours Approved shall be basis of computation for OT Pay.
However, if the Actual OT Hours is less than OT Hours Approved, then
Actual OT shall be basis of computation for pay. 
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.5in; margin-bottom: 0in; line-height: 100%">
e. Meetings that range from at least one (1) hour are eligible for OT
requests.</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in; line-height: 100%">
<BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in">Q:
<B>Whom do I contact if I have any questions?</B></P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.25in; margin-bottom: 0in">
<B>A: Immediate Superior</B></P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><B>Q:
Whom do I escalate to?</B></P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.25in; margin-bottom: 0in">
<B>A: HR- Employee Relation </B>
</P>
<P CLASS="western" ALIGN=CENTER STYLE="margin-top: 0.02in; margin-bottom: 0in; line-height: 100%">
<FONT FACE="Calibri, serif"><B>LEAVE POLICY</B></FONT></P>
<CENTER>
	<TABLE WIDTH=430 BORDER=1 BORDERCOLOR="#00000a" CELLPADDING=7 CELLSPACING=0>
		<COL WIDTH=53>
		<COL WIDTH=204>
		<COL WIDTH=128>
		<TR VALIGN=TOP>
			<TD WIDTH=53 HEIGHT=8>
				<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in"><BR>
				</P>
			</TD>
			<TD WIDTH=204>
				<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in">
				<FONT FACE="Calibri, serif"><B>Release Date:</B></FONT></P>
				<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in"><FONT FACE="Calibri, serif">February
				2012</FONT></P>
			</TD>
			<TD WIDTH=128>
				<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in">
				<FONT FACE="Calibri, serif"><B>Review Date:</B></FONT></P>
				<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in"><FONT FACE="Calibri, serif"><B>June
				2013</B></FONT></P>
			</TD>
		</TR>
		<TR VALIGN=TOP>
			<TD WIDTH=53 HEIGHT=8>
				<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in">
				<FONT FACE="Calibri, serif"><B>Version:</B></FONT></P>
				<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in"><FONT FACE="Calibri, serif"><B>1.0</B></FONT></P>
			</TD>
			<TD WIDTH=204>
				<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in">
				<FONT FACE="Calibri, serif"><B>Process Owner:</B></FONT></P>
				<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in"><FONT FACE="Calibri, serif">Human
				Resource </FONT>
				</P>
			</TD>
			<TD WIDTH=128>
				<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in">
				<FONT FACE="Calibri, serif"><B>Process Administrator:</B></FONT></P>
				<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in"><FONT FACE="Calibri, serif">Supervisors/HOD/HR</FONT></P>
			</TD>
		</TR>
	</TABLE>
</CENTER>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in; line-height: 100%">
<BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><U><B>Objective</B></U></P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in">To draw
up the leave facilities provided by the company for the benefit of
the employees and to present the process for its availment.</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><U><B>Scope</B></U></P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in">The
policy is applicable to all employees.<FONT COLOR="#ff0000">  </FONT>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><U><B>Leaves</B></U></P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in">Different
kinds of Leave</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in">Weekly
offs are not included in the calculation of days of leaves taken.</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in">The year
for calculation of leave will be calendar year.</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><U><B>Policy</B></U></P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in"> It is so
important to find some leisure time away from the daily stressors of
work. From time to time, one needs to recharge one&rsquo;s batteries
so-to-speak. Not taking vacations can affect not only one&rsquo;s
mental state, but also one&rsquo;s physical state. Moreover, the
effects of taking too little vacation time play out in various forms
<FONT FACE="SymbolOOEnc, serif">- </FONT>mental illness, physical
illness, stress and burnout, relationship and family problems, higher
absenteeism and benefits costs, and a general sense of
dissatisfaction with one&rsquo;s life.</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in">The
company has recognized this and has provided leave benefits so that
the employees can go on paid leaves to rejuvenate themselves.</P>
<OL TYPE=I>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><U><B>Vacation Leave</B></U></P>
</OL>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><B>Availing
Leave:</B></P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in">VL shall
be scheduled taking into primary consideration the operating
conditions of the company. Whenever Practicable, the employees
preference shall be followed. However, authorization and scheduling
of VL shall remain to be the right of the management to ensure
efficiency in operation. 
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in">The
employee must file VL in accordance to prescribed time period:</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><I>For
locals:</I></P>
<UL>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in">A minimum of two (2)
	weeks advanced notice is required when applying for VLs for two (2)
	consecutive days or more.</P>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in">A minimum of one (1)
	week advanced notice is required when applying for VLs for less than
	two (2) consecutive days.</P>
</UL>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><I>For
expats:</I></P>
<UL>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in">A minimum of one (1)
	month advanced notice is required when applying for VLs exceeding
	three (3) days</P>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in">A minimum of two (2)
	weeks advanced notice is required when applying for VLs for three
	(3) days and below.</P>
</UL>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in">Leaves
that are not sanctioned by the immediate superior, prior to taking it
shall be unauthorized and will be considered (AWOL). 
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><B>A</B>n
employee who voluntarily resign will be paid all his/&rsquo;her
accrued VLs due and not availed of provided the employee gives thirty
(30) day notice in writing to his/her immediate superior. 
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in">Accrued
VLs will be adjusted against the shortfall in notice period served at
the time of separation.</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in">Any
employee who is terminated for a cause, regardless of length of
service will not be paid his/her accrued VLs.</P>
<OL>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in">The employee who
	wishes to avail of the VL shall fill up the Leave Form in duplicate
	and forward the same to his/her immediate superior for approval.</P>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in">It is the full
	responsibility of the employee to obtain his immediate superior&rsquo;s
	approval and ensure that the approved leave application form is
	endorsed to the HR Compensation and benefits section for notation
	and remarks.</P>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in">HR/Admin shall
	maintain an updated record of the ailment while employees are to
	maintain their own record aside from accomplishing a Leave
	application Form.</P>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in">In cases where an
	employee wishes to avail of his scheduled VL but was denied for
	reason of service requirement, the employee shall be given the
	option to reschedule his VL within the year.</P>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in">The immediate
	superior disapproving the application, shall indicate the reason for
	denial to be noted in the application.</P>
</OL>
<P ALIGN=JUSTIFY STYLE="margin-left: 0.5in; margin-bottom: 0in"><BR>
</P>
<P ALIGN=JUSTIFY STYLE="margin-left: 0.5in; margin-bottom: 0in"><BR>
</P>
<P ALIGN=JUSTIFY STYLE="margin-left: 0.5in; margin-bottom: 0in"><BR>
</P>
<OL TYPE=I START=2>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><U><B>Sick Leave
	(SL)</B></U></P>
</OL>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><B>Availing
Leave:</B></P>
<OL>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in">An employee who is
	sick and cannot report to work must inform his superior of his
	illness.</P>
</OL>
<UL>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in">Employee,
	notification should be done at least one (1) hour before employee
	start of shift;</P>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in">As a general rule
	only personal notification shall be allowed, if personal  is not
	possible, notification should be done thru any of the following
	means:</P>
</UL>
<OL TYPE=a>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in">Letter signed by the
	employee and sent to immediate supervisor or HR one (1) hour before
	the required shift.</P>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in">Telephone advice (by
	employee personally) to the immediate superior</P>
</OL>
<UL>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><B>Notification
	through text will not be accepted</B></P>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in">Each day of
	inability to work is treated separately. Hence the employee must
	appropriately notify his immediate superior.</P>
</UL>
<OL START=2>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in">Immediately upon
	return to work, the employee must accomplish the Leave Application
	Form and submit the medical certificate within the same day to the
	immediate supervisor for approval. 
	</P>
</OL>
<P ALIGN=JUSTIFY STYLE="margin-left: 0.5in; margin-bottom: 0in">An
employee who failed to submit any of the documentation required will
be automatically penalized with salary deduction corresponding to the
absence. These absences shall be treated as an unexcused leaves and
not creditable against leave benefits.</P>
<OL START=3>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in">An employee, who is
	already in the office but has to leave because of illness, shall
	accomplish a leave application form duly noted by his superior
	before departure from the office. Extended absence beyond what is
	applied for shall be covered by another leave application form upon
	resumption to work.</P>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in">It is the full
	responsibility of the employee to obtain his immediate superior&rsquo;s
	approval and ensure that the approved leave application for is
	endorsed to the HR/Admin for notation/remarks.</P>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in">HR/Admin shall keep
	copy of the approved leave application form of the employee
	concerned.</P>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in">HR/Admin shall
	maintain an updated record of the availment while employees are to
	maintain their own record aside from accomplishing a Leave
	application Form.</P>
</OL>
<P ALIGN=JUSTIFY STYLE="margin-left: 0.5in; margin-bottom: 0in"><BR>
</P>
<OL TYPE=I START=3>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><U><B>Maternity
	Leave (ML)</B></U></P>
</OL>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.25in; margin-bottom: 0in">
All female employees will be eligible for Maternity Leave based on
the indicated number of calendar leaves on the table below.</P>
<TABLE WIDTH=614 BORDER=1 BORDERCOLOR="#00000a" CELLPADDING=7 CELLSPACING=0>
	<COL WIDTH=209>
	<COL WIDTH=194>
	<COL WIDTH=167>
	<TR VALIGN=TOP>
		<TD WIDTH=209 HEIGHT=8>
			<P CLASS="western" ALIGN=JUSTIFY><B>Maternity Leave</B></P>
		</TD>
		<TD WIDTH=194>
			<P CLASS="western" ALIGN=JUSTIFY><B>Leave Days (Local)</B></P>
		</TD>
		<TD WIDTH=167>
			<P CLASS="western" ALIGN=JUSTIFY><B>Leave Days(Expat)</B></P>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD WIDTH=209 HEIGHT=9>
			<P CLASS="western" ALIGN=JUSTIFY>Delivery/Abortion/Miscarriage</P>
		</TD>
		<TD WIDTH=194>
			<P CLASS="western" ALIGN=JUSTIFY>60 calendar days</P>
		</TD>
		<TD ROWSPAN=2 WIDTH=167>
			<P CLASS="western" ALIGN=JUSTIFY>60 calendar</P>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD WIDTH=209 HEIGHT=8>
			<P CLASS="western" ALIGN=JUSTIFY>Caesarian</P>
		</TD>
		<TD WIDTH=194>
			<P CLASS="western" ALIGN=JUSTIFY>78 calendar days</P>
		</TD>
	</TR>
</TABLE>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="text-indent: 0.5in; margin-bottom: 0in">
Any female employee availing ML whether local or expat has to give an
advance notice 3 months.</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><I><B>Local
Employees:</B></I></P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="text-indent: 0.5in; margin-bottom: 0in">
In case of miscarriage/abortion, a female employee can avail 60
calendar days of ML with corresponding full payment in accordance
with SSS law provided that:</P>
<UL>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in">The pregnant woman
	employee must have paid at least three monthly contributions within
	the 12-month period immediately preceding the semester of her
	childbirth or miscarriage.</P>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in">She accomplishes and
	submits to HR Compensation and Benefits section a copy of SSS
	Maternity Notification upon acquisition of knowledge that she is
	pregnant. This shall be the basis for release of the advance check
	representing the payment of SSS Maternity benefit not earlier than
	two (2) weeks prior to the delivery date.</P>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in">She will be paid
	with SSS and not insurance.</P>
</UL>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><B>Availing
Leave:</B></P>
<OL>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in">Upon acquisition of
	knowledge that she is pregnant, the employee must immediately
	accomplish and submit to HR Compensation and Benefits section.
	Employees must secure a copy of SSS Maternity Notification Form.</P>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in">Two weeks before the
	expected date of child birth immediately before the start of ML,
	employee must submit the approved leave application form and get her
	check representing payment of SSS Maternity benefit.</P>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in">Salary of employee
	on Maternity benefit shall be put on hold. Salary is resumed upon
	return to work.</P>
</OL>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><I><B>Expat
Employees:</B></I></P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="text-indent: 0.5in; margin-bottom: 0in">
Maternity Leave is only given by company to married female employees
who have 1 year tenure in company:</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><B>Availing
Leave:</B></P>
<OL>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in">Upon acquisition of
	knowledge that she is pregnant, the employee must immediately
	accomplish leave form and submit to HR Compensation and Benefits
	section. Attached would be the Medical result from physician of her
	pregnancy. 
	</P>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in">When the employee
	reports to work from her Maternity Leave, she must submit Birth
	Certificate or Death Certificate to HR Compensation and Benefits
	section within thirty (30) days. 
	</P>
</OL>
<P ALIGN=JUSTIFY STYLE="margin-left: 0.5in; margin-bottom: 0in"><BR>
</P>
<P ALIGN=JUSTIFY STYLE="margin-left: 0.5in; margin-bottom: 0in"><BR>
</P>
<P ALIGN=JUSTIFY STYLE="margin-left: 0.5in; margin-bottom: 0in"><BR>
</P>
<P ALIGN=JUSTIFY STYLE="margin-left: 0.5in; margin-bottom: 0in"><BR>
</P>
<OL TYPE=I START=4>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><U><B>Paternity
	Leave</B></U></P>
</OL>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><A NAME="_GoBack"></A>
Every legally married local male employee is entitled for paternity
leave of 7 days with full pay. It is only available<FONT SIZE=2> for
the first four (4) deliveries of&nbsp;the legitimate spouse with whom
the employee is cohabiting; it i</FONT>s intended for the father to
effectively lend support to his wife in her period of recovery and/or
in the nursing of the newly-born child.</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><B>Availing
Leave:</B></P>
<OL>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in">Male employee must
	notify the<B> </B>HR Compensation and Benefits section and submit
	the photocopy of a valid Marriage Certificate.</P>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in">Miscarriage should
	be sustained by:</P>
</OL>
<UL>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in">Marriage certificate</P>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in">Ultrasound report
	with wife&rsquo;s name and estimated time of delivery; or doctor&rsquo;s
	certificate declaring the miscarriage or legal abortion.</P>
</UL>
<OL START=3>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in">Any male employee
	availing of PL should give at least one (1) week notice to his
	immediate superior.</P>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in"> Upon acquisition of
	knowledge that his wife is pregnant, the employee must immediately
	notify the HR Compensation and Benefits by submitting a medical
	certificate bearing the name of his wife and the status of
	pregnancy.</P>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in">It is the full
	responsibility of the employee to obtain his immediate superior&rsquo;s
	approval and ensure that the approved leave application for is
	endorsed to the HR Compensation and benefits section for
	notation/remarks.</P>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in">HR Compensation and
	Benefits shall keep one copy of the approved leave application form.</P>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in">HR Compensation and
	Benefits shall maintain an updated record of the availment while
	employees are to maintain their own record aside from accomplishing
	a Leave application Form.</P>
</OL>
<P ALIGN=JUSTIFY STYLE="margin-left: 0.5in; margin-bottom: 0in"><BR>
</P>
<OL TYPE=I START=5>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><U><B>Solo Parent
	Leave</B></U></P>
</OL>
<P ALIGN=JUSTIFY STYLE="margin-bottom: 0in">Leave benefits granted to
a solo parent to enable him/her to perform parental duties and
responsibilities where physical presence is required. In addition to
leave privileges under existing laws, parental leave of not more than
seven (7) working days every year shall be granted to any solo parent
employee who has rendered service of at least one (1) year.</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><B>Eligibility:</B></P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in">A &ldquo;solo
parent&rdquo; (pursuant to<A HREF="http://jlp-law.com/library/?article=ra8972"><FONT COLOR="#00000a">
Republic Act No. 8972</FONT></A>, also known as the &ldquo;Solo
Parents&rsquo; Welfare Act of 2000&Prime;) is any individual who
falls under any of the following categories:</P>
<OL>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in">A woman who gives
	birth as a result of rape and other crimes against chastity even
	without a final conviction of the offender: Provided, That the
	mother keeps and raises the child;</P>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in">Parent left solo or
	alone with the responsibility of parenthood due to death of spouse;</P>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in">Parent left solo or
	alone with the responsibility of parenthood while the spouse is
	detained or is serving sentence for a criminal conviction for at
	least one (1) year;</P>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in">Parent left solo or
	alone with the responsibility of parenthood due to physical and/or
	mental incapacity of spouse as certified by a public medical
	practitioner;</P>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in">Parent left solo or
	alone with the responsibility of parenthood due to legal separation
	or <EM><SPAN STYLE="font-style: normal">de facto</SPAN></EM>
	separation from spouse for at least one (1) year, as long as he/she
	is entrusted with the custody of the children;</P>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in">Parent left solo or
	alone with the responsibility of parenthood due to declaration of
	nullity or annulment of marriage as decreed by a court or by a
	church as long as he/she is entrusted with the custody of the
	children;</P>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in">Parent left solo or
	alone with the responsibility of parenthood due to abandonment of
	spouse for at least one (1) year;</P>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in">Unmarried
	mother/father who has preferred to keep and rear her/his
	child/children instead of having others care for them or give them
	up to a welfare institution;</P>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in">Any other person who
	solely provides parental care and support to a child or children;</P>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in">Any family member
	who assumes the responsibility of head of family as a result of the
	death, abandonment, disappearance or prolonged absence of the
	parents or solo parent.</P>
</OL>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in">A change
in the status or circumstance of the parent claiming benefits under
Republic Act No. 8972, such that he/she is no longer left alone with
the responsibility of parenthood, shall terminate his/her eligibility
for these benefits.</P>
<P CLASS="western" STYLE="margin-bottom: 0in"> <B>Conditions for
Entitlement:</B></P>
<P CLASS="western" STYLE="margin-left: 0.5in; margin-bottom: 0in">(a)
He/She has rendered at least one (1) year of service;<BR>(b) He/She
has notified his/her employer of the availment thereof within one (1)
week prior to availing of the SPL except emergency cases.<BR>(c)
He/She has presented a <B>valid</B> Solo Parent Identification Card
to his/her employer.</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><B>Limitations:</B></P>
<OL>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in">The SPL can be
	availed of in staggered or continuous basis subject to the approval
	of the immediate superior.</P>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in">The parental leave
	shall be availed of every year and shall not be convertible to cash
	if not availed of within the calendar year.</P>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in">The immediate
	superior may determine whether granting of parental leave is proper
	or may conduct the necessary investigation to ascertain ground of
	termination of withdrawal of the privilege exist.</P>
</OL>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><B>Availing
Leave:</B></P>
<OL>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in">The employee who
	wishes to avail of the SPL shall present his/her employer with a
	Solo Parent ID issued by the City/Municipal Social Welfare and
	development Office.</P>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in">Any male employee
	availing of SPL should give at least one (1) week notice to his
	immediate superior.</P>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in">It is the full
	responsibility of the employee to obtain his immediate superior&rsquo;s
	approval and ensure that the approved leave application for is
	endorsed to the HR Compensation and benefits section for
	notation/remarks.</P>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in">It is the full
	responsibility of the employee to ensure that the Solo Parent ID is
	valid and renewed on time for availment of SPL. 
	</P>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in">HR/Admin shall keep
	copy of the approved leave application form 201 file of the employee
	concerned.</P>
</OL>
<P ALIGN=JUSTIFY STYLE="margin-left: 0.5in; margin-bottom: 0in"><BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in">Q:
<B>Whom do I contact if I have any questions?</B></P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.25in; margin-bottom: 0in">
<B>A: Immediate Superior</B></P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><B>Q:
Whom do I escalate to?</B></P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.25in; margin-bottom: 0in">
<B>A: HR- Employee Relation </B>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><BR>
</P>
<P ALIGN=JUSTIFY STYLE="margin-left: 0.5in; margin-bottom: 0in"><BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in; line-height: 100%">
<BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in; line-height: 100%">
<BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in; line-height: 100%">
<BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in; line-height: 100%">
<BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in; line-height: 100%">
<BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in; line-height: 100%">
<BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in; line-height: 100%">
<BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in; line-height: 100%">
<BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in; line-height: 100%">
<BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in; line-height: 100%">
<BR>
</P>
<P CLASS="western" ALIGN=CENTER STYLE="margin-top: 0.02in; margin-bottom: 0in; line-height: 100%">
<FONT FACE="Calibri, serif"><B>CODE OF CONDUCT POLICY</B></FONT></P>
<P CLASS="western" ALIGN=CENTER STYLE="margin-top: 0.02in; margin-bottom: 0in; line-height: 100%">
<BR>
</P>
<CENTER>
	<TABLE WIDTH=430 BORDER=1 BORDERCOLOR="#00000a" CELLPADDING=7 CELLSPACING=0>
		<COL WIDTH=53>
		<COL WIDTH=204>
		<COL WIDTH=128>
		<TR VALIGN=TOP>
			<TD WIDTH=53 HEIGHT=8>
				<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in"><BR>
				</P>
			</TD>
			<TD WIDTH=204>
				<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in">
				<FONT FACE="Calibri, serif"><B>Release Date:</B></FONT></P>
				<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in"><FONT FACE="Calibri, serif">February
				2012</FONT></P>
			</TD>
			<TD WIDTH=128>
				<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in">
				<FONT FACE="Calibri, serif"><B>Review Date:</B></FONT></P>
				<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in"><FONT FACE="Calibri, serif"><B>June
				2013</B></FONT></P>
			</TD>
		</TR>
		<TR VALIGN=TOP>
			<TD WIDTH=53 HEIGHT=8>
				<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in">
				<FONT FACE="Calibri, serif"><B>Version:</B></FONT></P>
				<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in"><FONT FACE="Calibri, serif"><B>1.0</B></FONT></P>
			</TD>
			<TD WIDTH=204>
				<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in">
				<FONT FACE="Calibri, serif"><B>Process Owner:</B></FONT></P>
				<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in"><FONT FACE="Calibri, serif">Human
				Resource </FONT>
				</P>
			</TD>
			<TD WIDTH=128>
				<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in">
				<FONT FACE="Calibri, serif"><B>Process Administrator:</B></FONT></P>
				<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in"><FONT FACE="Calibri, serif">Supervisors/HOD/HR</FONT></P>
			</TD>
		</TR>
	</TABLE>
</CENTER>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in; line-height: 100%">
<FONT FACE="Calibri, serif"><U><B>Objective</B></U></FONT></P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in; line-height: 100%">
<FONT FACE="Calibri, serif">The rules and regulations embodied in
this Code of Conduct were adopted in order to:</FONT></P>
<UL>
	<LI><P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in; line-height: 100%">
	<FONT FACE="Calibri, serif">Institute knowledge among employees on
	the standard of conduct and behavior expected of them in discharge
	of their duties and responsibilities, the customer and the public.</FONT></P>
	<LI><P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in; line-height: 100%">
	<FONT FACE="Calibri, serif">Improve order, discipline, efficiency
	and harmonious working relationship.</FONT></P>
	<LI><P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in; line-height: 100%">
	<FONT FACE="Calibri, serif">Provide satisfactory guiding principal
	in the administration of disciplinary/ corrective action cases.</FONT></P>
</UL>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in; line-height: 100%">
<FONT FACE="Calibri, serif">Whereas disciplinary / corrective action
are essentials for violation of this rules and regulations, the
Company believes and adopt the contractive approach of discipline
whereby the main principal or over all purpose is more prevention of
behavioral deviation from the acceptable norms of conduct rather than
being punitive.</FONT></P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in; line-height: 100%">
<FONT FACE="Calibri, serif">The construction approach does not apply
to grave offenses or serious misconduct of which any employee may be
discharged immediately after observing due process. As further
action, the Company is not barred/precluded from instituting
necessary and appropriate civil and criminal cases against an
employee if warranted under the circumstances.</FONT></P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in; line-height: 100%">
<FONT FACE="Calibri, serif"><U><B>Scope </B></U></FONT>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in; line-height: 100%">
<FONT FACE="Calibri, serif">The Code of Conduct Policy shall be
applied and enforced neutrally to all employees of the Company
regardless the rank and position.</FONT></P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in; line-height: 100%">
<FONT FACE="Calibri, serif">All employees are therefore required,
required to read this Code of Conduct Policy and understand its
purpose and objects, abide by its rules and regulations and
cooperation with the Company in its implementation in order to
achieve efficiency, productivity and harmony for the good of all.</FONT></P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in; line-height: 100%">
<FONT FACE="Calibri, serif"><U><B>Definitions:</B></U></FONT></P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in; line-height: 100%">
&ldquo;<FONT FACE="Calibri, serif"><I>Employee&rdquo;</I></FONT><FONT FACE="Calibri, serif">
means all persons including contractual, casual and project hired
employees assigned in various sites, or different projects,
probationary and regular employees under the employ and in the active
payroll of the Company.</FONT></P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in; line-height: 100%">
<BR>
</P>
<P ALIGN=JUSTIFY STYLE="margin-left: 0.75in; margin-top: 0.02in; margin-bottom: 0in; line-height: 100%">
<BR>
</P>
<UL>
	<LI><P ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in; line-height: 100%">
	<FONT FACE="Calibri, serif"><B>Contractual/Casual/Fixed Term</B></FONT></P>
</UL>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in; line-height: 100%">
<FONT FACE="Calibri, serif">This refers to an employment hires for a
temporary period of time for a specific need or project. He/She may
be engaged for a minimum of three (3) months to a maximum of six (6)
months.</FONT></P>
<UL>
	<LI><P ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in; line-height: 100%">
	<FONT FACE="Calibri, serif"><B>Probationary</B></FONT></P>
</UL>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in; line-height: 100%">
<FONT FACE="Calibri, serif">This is hired for a trial or probationary
period normally from three (3) months to a maximum of six (6) months,
during which the new employee&rsquo;s actual performance is compared
with the Company&rsquo;s standard. A probationary period of 6 months
shall be computed as one hundred eighty (180) days from the date of
probationary employee started working with the company. If Supervisor
or a manager determines that the work performance is unsatisfactory
at any time during this period, a discussion should be held with the
employee pointing out the deficiencies and measures that should be
taken to correct them. If the employee continuous to perform at an
unacceptable level, a supervisor/manager should review the provision
in this policy manual or termination for poor performance of failure
to comply with the Company Policy, and consult with the HRAD. </FONT>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in; line-height: 100%">
<FONT FACE="Calibri, serif">The Company&rsquo;s Performance Appraisal
is done by each department/section:</FONT></P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.5in; margin-top: 0.02in; margin-bottom: 0in; line-height: 100%">
<BR>
</P>
<TABLE WIDTH=476 BORDER=1 BORDERCOLOR="#000001" CELLPADDING=1 CELLSPACING=0>
	<COL WIDTH=268>
	<COL WIDTH=202>
	<TR>
		<TD WIDTH=268 HEIGHT=35 BGCOLOR="#ffffff">
			<P CLASS="western" ALIGN=CENTER STYLE="margin-top: 0.02in"><FONT COLOR="#000000"><FONT FACE="Calibri, serif"><B>APPRRAISEE</B></FONT></FONT></P>
		</TD>
		<TD WIDTH=202 BGCOLOR="#ffffff">
			<P CLASS="western" ALIGN=CENTER STYLE="margin-top: 0.02in"><FONT COLOR="#000000"><FONT FACE="Calibri, serif"><B>APPRAISER</B></FONT></FONT></P>
		</TD>
	</TR>
	<TR>
		<TD WIDTH=268 HEIGHT=36 BGCOLOR="#ffffff">
			<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in"><FONT COLOR="#000000"><FONT FACE="Calibri, serif">Operation
			Staff</FONT></FONT></P>
		</TD>
		<TD WIDTH=202 BGCOLOR="#ffffff">
			<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in"><FONT COLOR="#000000"><FONT FACE="Calibri, serif">Immediate
			Head / HOD</FONT></FONT></P>
		</TD>
	</TR>
	<TR>
		<TD WIDTH=268 HEIGHT=36 BGCOLOR="#ffffff">
			<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in"><FONT COLOR="#000000"><FONT FACE="Calibri, serif">Officer/
			Supervisor / Asst. Manager</FONT></FONT></P>
		</TD>
		<TD WIDTH=202 BGCOLOR="#ffffff">
			<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in"><FONT COLOR="#000000"><FONT FACE="Calibri, serif">HOD</FONT></FONT></P>
		</TD>
	</TR>
	<TR>
		<TD WIDTH=268 HEIGHT=36 BGCOLOR="#ffffff">
			<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in"><FONT COLOR="#000000"><FONT FACE="Calibri, serif">Casuals</FONT></FONT></P>
		</TD>
		<TD WIDTH=202 BGCOLOR="#ffffff">
			<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in"><FONT COLOR="#000000"><FONT FACE="Calibri, serif">Immediate
			Head</FONT></FONT></P>
		</TD>
	</TR>
	<TR>
		<TD WIDTH=268 HEIGHT=36 BGCOLOR="#ffffff">
			<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in"><FONT COLOR="#000000"><FONT FACE="Calibri, serif">Non-Operation
			employee (HR, Acctg., Utilities)</FONT></FONT></P>
		</TD>
		<TD WIDTH=202 BGCOLOR="#ffffff">
			<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in"><FONT COLOR="#000000"><FONT FACE="Calibri, serif">Immediate
			Head / HOD</FONT></FONT></P>
		</TD>
	</TR>
	<TR>
		<TD WIDTH=268 HEIGHT=35 BGCOLOR="#ffffff">
			<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in"><FONT COLOR="#000000"><FONT FACE="Calibri, serif">Manager
			/ HOD</FONT></FONT></P>
		</TD>
		<TD WIDTH=202 BGCOLOR="#ffffff">
			<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in"><FONT COLOR="#000000"><FONT FACE="Calibri, serif">Immediate
			Head / GM</FONT></FONT></P>
		</TD>
	</TR>
</TABLE>
<UL>
	<LI><P ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in; line-height: 100%">
	<FONT FACE="Calibri, serif"><B>Regular</B></FONT></P>
</UL>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in; line-height: 100%">
<FONT FACE="Calibri, serif">This is hired for a regular
position/status upon satisfactory completion of the probationary
period.</FONT></P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in; line-height: 100%">
&lsquo;&rsquo;<FONT FACE="Calibri, serif"><I>CODE&rsquo;&rsquo;</I></FONT><FONT FACE="Calibri, serif">
refers to this Code of Conduct, including but not limited to, the
Policy of Discipline and such other official written policy and
procedures issued by the HR/Admin which refers to or involves a rule
of conduct and/or discipline that apply to the Employees of the
Company.</FONT></P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in; line-height: 100%">
&rdquo;<FONT FACE="Calibri, serif"><I>Company&rdquo;</I></FONT><FONT FACE="Calibri, serif">
refers to Pacific Sea BPO Services Inc..</FONT></P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in; line-height: 100%">
&ldquo;<FONT FACE="Calibri, serif"><I>Company Premises&rdquo;</I></FONT><FONT FACE="Calibri, serif">
refers to any vehicles, offices, areas or grounds occupied, owned or
leased by or for the benefit of the company; provided that, Company
Premises may include venues rented, leased or temporarily occupied
for official conferences, meeting, seminars, outings, parties or
gatherings of the Company attended by employees, for duration of the
Company&rsquo;s offices, foe purposes of this Code, shall be
considered part of the Company Premises.</FONT></P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in; line-height: 100%">
&ldquo;<FONT FACE="Calibri, serif"><I>Company Property&rdquo;</I></FONT><FONT FACE="Calibri, serif">
refers to any property whether real, personal, movable, immovable,
intellectual or virtual which it&rsquo;s owned. Leased (even
temporarily or for short duration only), used, licensed to, or held
by or for the benefit of the Company.</FONT></P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in; line-height: 100%">
&ldquo;<FONT FACE="Calibri, serif"><I>Day&rdquo;</I></FONT><FONT FACE="Calibri, serif">
shall mean &ldquo;Normal working day&rdquo;</FONT></P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in; line-height: 100%">
&ldquo;<FONT FACE="Calibri, serif"><I>Dependent member of the family&rdquo;</I></FONT><FONT FACE="Calibri, serif">
shall mean the employee&rsquo;s relative by blood or affinity, within
the third civil degree, whether or not such relative is actually
dependent for his livelihood or support on the employee, or any
relative of more remote degree or any other person who is dependent
on the employee.</FONT></P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in; line-height: 100%">
&lsquo;&rsquo;<FONT FACE="Calibri, serif"><I>Gross Negligence&rdquo;</I></FONT><FONT FACE="Calibri, serif">
shall mean wanton recklessness or carelessness that causes damage to
persons and/or Company properties and/or Company's business concerns.</FONT></P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in; line-height: 100%">
<FONT FACE="Calibri, serif"><I>&quot;Intentional Acts of Damage&quot;</I></FONT><FONT FACE="Calibri, serif">
shall mean willful, malicious, deliberate or excessive acts that
cause damage to persons and/or Company properties and business
concerns.</FONT></P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in; line-height: 100%">
<FONT FACE="Calibri, serif"><I>&quot;Offense&quot;</I></FONT><FONT FACE="Calibri, serif">
means an act or omission by an Employee which involves or results in
the violation of this Code, whether or not such act or omission
results in any actual injury or damage to the Company or any
individual. </FONT>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in; line-height: 100%">
<FONT FACE="Calibri, serif"><I>&quot;Site&quot;</I></FONT><FONT FACE="Calibri, serif">
shall mean all properties, landholdings, including properties owned
or rented by the Company. It also covers working areas occupied by
the employees, projects sites and the like.</FONT></P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in; line-height: 100%">
<FONT FACE="Calibri, serif"><I>&quot;Top Management&quot;</I></FONT><FONT FACE="Calibri, serif">
shall mean and refer to the Board of Directors, the CEO and the
General Manager.</FONT></P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in; line-height: 100%">
<FONT FACE="Calibri, serif"><I>&quot;Aggravated Violations&quot;</I></FONT><FONT FACE="Calibri, serif">
shall mean habitual or excessive violation of Company
Policies/Instruction over a limited period of time and or violation
that have caused the disruption of or prejudice to the Company's
business operation.</FONT></P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in; line-height: 100%">
<FONT FACE="Calibri, serif"><U><B>Policy</B></U></FONT></P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in; line-height: 100%">
<FONT FACE="Calibri, serif">The Company considers the prevention of
situations which result in disciplinary action as one of the
objectives of effective employee-management relations. In given
circumstances, however, disciplinary action may be required to
correct and rehabilitate the employee and/or improve the
effectiveness of the work force. Given such conditions, the Company
hereby promulgates the following rules and regulations for the
guidance of and compliance by all employees. Violation of any
provision of this Code constitutes ground for disciplinary action and
will subject the employee to the remedial penalty prescribed
therefore.</FONT></P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in; line-height: 100%">
<FONT FACE="Calibri, serif">This Code is necessary to help ensure the
safety, security and productivity of all employees. In order that the
employees and the Company can establish and maintain the best of
working conditions, the Company has formulated the Code of Conduct
Policy.</FONT></P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in; line-height: 100%">
<FONT FACE="Calibri, serif">The Company shall take disciplinary
action against employees for violations of the Code of Conduct, or
any Company rule, regulation or policy.</FONT></P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in; line-height: 100%">
<FONT FACE="Calibri, serif">The foregoing list of offenses is
non-exclusive and is without prejudice to the right of the Company to
impose disciplinary action for violations under the Labor Code, other
related laws and regulations, and industry practice.</FONT></P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in; line-height: 100%">
<FONT FACE="Calibri, serif"><U><B>Responsibilities</B></U></FONT></P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in; line-height: 100%">
<FONT FACE="Calibri, serif">HR/Admin Manager:</FONT></P>
<OL TYPE=a>
	<LI><P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in; line-height: 100%">
	<FONT FACE="Calibri, serif">Regularly check and monitor effective
	implementation of the Policy.</FONT></P>
	<LI><P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in; line-height: 100%">
	<FONT FACE="Calibri, serif">Provide continuing advice and guidance
	to the Managers/Supervisors in the implementation of the said Policy
	of Discipline.</FONT></P>
	<LI><P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in; line-height: 100%">
	<FONT FACE="Calibri, serif">Conduct continuing training programs for
	Managers and Supervisors on positive approaches to discipline and
	counseling techniques and other related areas.</FONT></P>
	<LI><P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in; line-height: 100%">
	<FONT FACE="Calibri, serif">Develop and maintain a centralized and
	updated record of offenses committed by employee and action taken
	thereon for reference and as basis for future Company action.</FONT></P>
	<LI><P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in; line-height: 100%">
	<FONT FACE="Calibri, serif">Evaluate the state of discipline in the
	Company and make periodic reports and recommendations to the Company
	President or GM on actual status and areas where improvements may be
	required.</FONT></P>
	<LI><P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in; line-height: 100%">
	<FONT FACE="Calibri, serif">Ensure that all government and/or legal
	reports pertinent to disciplinary action cases are properly and
	fully complied with.</FONT></P>
	<LI><P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in; line-height: 100%">
	<FONT FACE="Calibri, serif">Liaise with Company's lawyers to ensure
	correctness of legal processes and decisions implemented by the
	Company.</FONT></P>
</OL>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in; line-height: 100%">
<FONT FACE="Calibri, serif">Department Managers/HOD:</FONT></P>
<OL TYPE=a>
	<LI><P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in; line-height: 100%">
	<FONT FACE="Calibri, serif">Implement strictly and consistently the
	Policy of Discipline.</FONT></P>
	<LI><P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in; line-height: 100%">
	<FONT FACE="Calibri, serif">Ensure that the said Policy of
	Discipline is communicated to and understood by all employees.</FONT></P>
	<LI><P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in; line-height: 100%">
	<FONT FACE="Calibri, serif">Monitor compliance by employees with the
	said Policy.</FONT></P>
	<LI><P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in; line-height: 100%">
	<FONT FACE="Calibri, serif">Advice the Department Manager/HOD and
	its manager or supervisors on the state of discipline in their
	respective departments; problems, if any, and recommend solution(s)
	corrective action(s).</FONT></P>
</OL>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in; line-height: 100%">
<FONT FACE="Calibri, serif">Employees:</FONT></P>
<OL TYPE=a>
	<LI><P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in; line-height: 100%">
	<FONT FACE="Calibri, serif">Know and understand in full the Code and
	Policy of Discipline. Ignorance of this Policy and its implementing
	guidelines will not excuse the employee from being penalized in
	accordance with this Policy.</FONT></P>
	<LI><P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in; line-height: 100%">
	<FONT FACE="Calibri, serif">Strictly adhere to the said Code and
	Policy of Discipline including those changes that maybe issued by
	the Company.</FONT></P>
</OL>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in; line-height: 100%">
<FONT FACE="Calibri, serif">OFFICE INTERACTIONS AND RELATIONSHIPS</FONT></P>
<OL>
	<LI><P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in; line-height: 100%">
	<FONT FACE="Calibri, serif">All employees must conduct themselves,
	in their interactions with their supervisors, managers, or other
	co-workers, in accordance with reasonable standards of
	professionalism.</FONT></P>
	<LI><P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in; line-height: 100%">
	<FONT FACE="Calibri, serif">Employees must not utilize their
	relationships with their co-workers, their status in the Company, or
	their access to company information, facilities and services, in a
	manner which involves or is part of a course of conduct which is
	likely to interfere substantially with effective fulfillment of
	Company functions or obligations, including the obligations and
	duties imposed by this Code of Conduct, or constituting knowing
	participation in a criminally punishable violation of law. No
	sanctions, however, shall be imposed under this provision in a
	manner that will deprive any employee of their rights of free
	expression and association, or other social rights.</FONT></P>
	<LI><P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in; line-height: 100%">
	<FONT FACE="Calibri, serif">Examples of inappropriate behavior
	include but are not limited to requiring the performance of
	inappropriate personal services; assigning tasks for punishment
	rather than for job-related reasons; intentional disruption of work
	activities; and intentional neglect of necessary communications.</FONT></P>
	<LI><P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in; line-height: 100%">
	<FONT FACE="Calibri, serif">Employees must not use their position,
	authority, or relationship with their co-workers to obtain
	uncompensated labor for their own personal or pecuniary gain. They
	may not ask employees to perform services unrelated to legitimate
	work requirements. Employees must not solicit gifts or favors from
	their co-workers, nor may they accept gifts or favors where they
	have reason to believe that such gift or favor is motivated by a
	desire to secure some advantage.</FONT></P>
	<LI><P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in; line-height: 100%">
	<FONT FACE="Calibri, serif">Employees must not reveal matters
	related in confidence by another employee, except as required by
	company policy or by law. Personal matters relating to an employee
	must not be revealed by his or her co-workers under circumstances
	that may lead to interpersonal conflicts, or that could cause
	imbalance in the harmony of the workplace.</FONT></P>
	<LI><P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in; line-height: 100%">
	<FONT FACE="Calibri, serif">Where the management has reasonable
	ground to believe that a certain personal relationship among
	employees has a substantial risk of resulting in inappropriate or
	unethical behavior, risk of loss to Company profits or property, the
	management may take the appropriate steps/disciplinary measures to
	reduce the risk of such behavior, including but not limited to
	reassigning one or more of the employees concerned.</FONT></P>
	<LI><P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in; line-height: 100%">
	<FONT FACE="Calibri, serif">Employees are strongly discouraged to
	have an intimate relationship with their co-employees. No public
	display of affection or sensual communication will be tolerated
	within the Company&rsquo;s premises.</FONT></P>
</OL>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in; line-height: 100%">
<BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in; line-height: 100%">
<BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in; line-height: 100%">
<BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in; line-height: 100%">
<BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in; line-height: 100%">
<BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in; line-height: 100%">
<BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in; line-height: 100%">
<BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in; line-height: 100%">
<FONT FACE="Calibri, serif"><B>WORK DECORUM</B></FONT></P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in; line-height: 100%">
<FONT FACE="Calibri, serif"><B>I. Dress Code</B></FONT></P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in; line-height: 100%">
<FONT FACE="Calibri, serif">All employees are required to appear
professional, clean and neat-looking at all times so as to maintain
the desired corporate image of the Company during the official
working hours, whether performing the job inside the office premises,
or outside rendering task on official business purpose, except for
official business task wherein more comfortable clothes are
necessary, to wit:</FONT></P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in; line-height: 100%">
<FONT FACE="Calibri, serif">Employees (casual staff) who are issued
with uniforms must wear them at all times while on duty. Failure to
wear such uniforms shall be construed as an act of misconduct and the
employee shall be liable for disciplinary action by the Company.
Employees are only allowed to wear their uniform outside the
Company's premises while on their way to and from work.</FONT></P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in; line-height: 100%">
<FONT FACE="Calibri, serif"><B>II. Communication</B></FONT></P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in; line-height: 100%">
<FONT FACE="Calibri, serif">All employees are required to regularly
check the Bulletin boards located the operation&rsquo;s floor or to
browse its soft copy located in the &ldquo;P&rdquo; Drive. All
employees are presumed to be up to date with the events, policies,
announcements and memo of the Company.</FONT></P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in; line-height: 100%">
<FONT FACE="Calibri, serif"><B>III. Identification Card</B></FONT></P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in; line-height: 100%">
<FONT FACE="Calibri, serif">All employees are required to wear at all
times their identification cards within Company premises. The use of
identification cards helps ensure safety and protection of all
employees as well as Company assets and properties. In case of loss
of I.D. cards, the employee shall be excused for failing to display
or present his/her I.D. card on the first working day only. He/She
should immediately report the loss to his/her immediate superior and
proceed to the HRAD for the issuance of new I.D. card. A penalty of
PhP 150.00 shall be charge for the issuance of the new I.D.</FONT></P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in; line-height: 100%">
<FONT FACE="Calibri, serif"><B>IV. Duty Roster </B></FONT>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in; line-height: 100%">
<FONT FACE="Calibri, serif">Company employees should take the time
each week to review the schedule. Department Manager/HOD will try to
avoid conflicts by knowing in advance days requested off, however not
all request will be honored. Refer any questions that you may have to
your Department Manager/HOD.</FONT></P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in; line-height: 100%">
<FONT FACE="Calibri, serif"><B>V. Employee Lockers</B></FONT></P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in; line-height: 100%">
<FONT FACE="Calibri, serif">Assigned lockers will be provide for the
Operations group and will be located at designated area. All agents
and other operations personnel will be required to deposit all
personal belongings before proceeding to their working stations.</FONT></P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in; line-height: 100%">
<FONT FACE="Calibri, serif"><B>VI. Professional Conduct</B></FONT></P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.25in; margin-top: 0.02in; margin-bottom: 0in; line-height: 100%">
<FONT FACE="Calibri, serif">Officers and employees are expected to be
professional in their attitude and conduct in dealing with
co-employees and clients.</FONT></P>
<OL TYPE=a>
	<LI><P ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in; line-height: 100%">
	<FONT FACE="Calibri, serif"><B>Punctuality and Tardiness</B></FONT></P>
</OL>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.5in; margin-top: 0.02in; margin-bottom: 0in; line-height: 100%">
<FONT FACE="Calibri, serif">Being punctual is expected of every
employee, it reflects his attitude, evaluation and advancement.</FONT></P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.5in; margin-top: 0.02in; margin-bottom: 0in; line-height: 100%">
<FONT FACE="Calibri, serif">All employees are expected and required
to be at their place of work and ready to perform their job at the
star of the business hour.</FONT></P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.5in; margin-top: 0.02in; margin-bottom: 0in; line-height: 100%">
<FONT FACE="Calibri, serif">Tardiness can be classified as excused
and unexcused.</FONT></P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.5in; margin-top: 0.02in; margin-bottom: 0in; line-height: 100%">
 <FONT FACE="Calibri, serif"><B>Excused Tardiness</B></FONT><FONT FACE="Calibri, serif">:
Circumstances which are beyond the control of the employees such as
heavy flood, typhoon (Signal No 4), earthquake, fire and other
similar circumstances. Generally, excused tardiness is not subject to
disciplinary action.</FONT></P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.5in; margin-top: 0.02in; margin-bottom: 0in; line-height: 100%">
<FONT FACE="Calibri, serif"><B>Unexcused Tardiness</B></FONT><FONT FACE="Calibri, serif">:
Circumstances which the employee has control or he has contributed
directly or indirectly to the happening. The employees who committed
an unexcused tardiness habitually shall be dealt with accordingly.
Accumulated man-hour loss shall be charged against the employee&rsquo;s
monthly pay.</FONT></P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.5in; margin-top: 0.02in; margin-bottom: 0in; line-height: 100%">
<FONT FACE="Calibri, serif">Employees are expected to call their
supervisor or immediate head at least one hour before their shift to
inform the supervisor/head of the employee&rsquo;s expected time of
tardiness or arrival. </FONT>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.5in; margin-bottom: 0in; line-height: 100%">
<BR>
</P>
<OL TYPE=a START=2>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%"><B>Break
	Time</B></P>
</OL>
<P ALIGN=JUSTIFY STYLE="margin-left: 0.75in; margin-bottom: 0in; line-height: 100%">
<BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.5in; margin-bottom: 0in; line-height: 100%">
Lunch break shall be for 1 hour.</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.5in; margin-bottom: 0in; line-height: 100%">
<BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.5in; margin-bottom: 0in; line-height: 100%">
No employee shall be allowed to take his breakfast after he has
signed in and use the company time for that purpose or other
recreational activity.</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.5in; margin-bottom: 0in; line-height: 100%">
<BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.5in; margin-bottom: 0in; line-height: 100%">
Any employee who shall go beyond the period allotted for break shall
be subject to disciplinary action.</P>
<OL TYPE=a START=3>
	<LI><P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in; line-height: 100%">
	<FONT FACE="Calibri, serif"><B>Conflict Interest</B></FONT></P>
</OL>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.5in; margin-top: 0.02in; margin-bottom: 0in; line-height: 100%">
<FONT FACE="Calibri, serif">Pursuing activities which may conflict
with on which may be prejudicial to the Company&rsquo;s interest are
not allowed. This includes soliciting, accepting or borrowing
anything from a client, business associate or potential business
associate which may influence our business relation.</FONT></P>
<OL TYPE=a START=4>
	<LI><P ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in; line-height: 100%">
	<FONT FACE="Calibri, serif"><B>Smoking</B></FONT></P>
</OL>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.5in; margin-top: 0.02in; margin-bottom: 0in; line-height: 100%">
<FONT FACE="Calibri, serif">Smoking is not permitted to the office
premises. Employees are required to go to the designated smoking
areas during break time.</FONT></P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.5in; margin-top: 0.02in; margin-bottom: 0in; line-height: 100%">
<BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.5in; margin-top: 0.02in; margin-bottom: 0in; line-height: 100%">
<BR>
</P>
<OL TYPE=a START=5>
	<LI><P ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in; line-height: 100%">
	<FONT FACE="Calibri, serif"><B>Personal Business</B></FONT></P>
</OL>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.5in; margin-top: 0.02in; margin-bottom: 0in; line-height: 100%">
<FONT FACE="Calibri, serif">Activities which are not related to work
responsibilities are not permitted during office hours. Employees
should not use paid working time for any personal business, whether
for profit or not.</FONT></P>
<OL TYPE=a START=6>
	<LI><P ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in; line-height: 100%">
	<FONT FACE="Calibri, serif"><B>Telephone Courtesy</B></FONT></P>
</OL>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.5in; margin-top: 0.02in; margin-bottom: 0in; line-height: 100%">
<FONT FACE="Calibri, serif">Proper telephone handling conveys
professional competence, business efficiency and friendliness. Answer
phone calls within first 1-3 rings.</FONT></P>
<OL TYPE=a START=7>
	<LI><P ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in; line-height: 100%">
	<FONT FACE="Calibri, serif"><B>Cellular Telephone</B></FONT></P>
</OL>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.5in; margin-top: 0.02in; margin-bottom: 0in; line-height: 100%">
<FONT FACE="Calibri, serif">The use of cellular phones while at work
may present a hazard or distraction to the employees and disrupt
normal business operations. For this reason, employees are ONLY to
use cellular phones during break time outside of work area. In cases
of emergencies, employees are first required to ask permission to
supervisor prior to using their phones. </FONT>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.5in; margin-top: 0.02in; margin-bottom: 0in; line-height: 100%">
 <FONT FACE="Calibri, serif">This policy is meant to ensure that the
use of cellular phones while at work is both safe and does no disrupt
business operations. The Company requires employees to stock their
cellphones in their locker while at work. </FONT>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.5in; margin-top: 0.02in; margin-bottom: 0in; line-height: 100%">
<BR>
</P>
<OL TYPE=a START=8>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><B>Drugs and Alcohol</B></P>
</OL>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.5in; margin-bottom: 0in">
The use of alcohol or drugs that will directly or indirectly affect
the employee&rsquo;s work performance, efficiency, safety and health
or seriously impair the value of the employee to the company is
strictly prohibited.</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.5in; margin-bottom: 0in">
The following rules and standard shall be observed by all the
employees during workdays any violation shall be dealt with
accordingly. Pacific Sea BPO Services Inc. may bring the matter to
the attention of appropriate law agency. 
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.5in; margin-bottom: 0in">
Strictly prohibited acts:</P>
<OL>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in">Use or possession of
	alcohol or illegal drugs, or being under its influence while
	working.</P>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in">Distribution,
	purchase, sale or any transaction of an illegal or controlled
	substance while working.</P>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in">Using or driving a
	company car or any of its property while under the influence of
	alcohol.</P>
</OL>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.5in; margin-bottom: 0in">
The company reserves the right to conduct random drug testing and
searches of an employee. The search shall extend to employees
pedestal, work area, pedestal, lockers, personal belongings and
vehicle. The employee&rsquo;s refusal to cooperate with the request
shall be a ground for termination.</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.5in; margin-bottom: 0in">
An employee who is convicted of any charges involving drugs or
alcohol while off the Company property will not be tolerated, and
will result to dismissal.</P>
<OL TYPE=a START=9>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><B>Lost and Found </B>
	</P>
</OL>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.5in; margin-bottom: 0in">
All items that are lost must be delivered immediately to the HR
Department. All items found must be turned over to HR Department.</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.5in; margin-bottom: 0in">
Every 15<SUP>th</SUP> of each month, the HR will post the list of
unclaimed items. The owner may claim the item within 15 days after
posting. Upon expiration of the fifteen (15) days period for claiming
the item the HR Department will donate the items to a designated
charitable institution.  
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.5in; margin-bottom: 0in">
To make a claim the owner must execute in writing his intention, he
must describe the characteristic of the item without seeing them.</P>
<OL TYPE=a START=10>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><B>Cleanliness and
	Order</B></P>
</OL>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.5in; margin-bottom: 0in">
At all times cleanliness and orderliness must be observed. All
disposable utensils, plates and cups must be thrown in the garbage
cans.</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.5in; margin-bottom: 0in">
CLEAN AS YOU GO policy is strictly implemented in all office area.
Any violation will be dealt will with accordingly.</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="text-indent: 0.25in; margin-bottom: 0in">
<B>VI Office Etiquette</B></P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.25in; margin-bottom: 0in">
All employees are expected to follow a set of conduct to ensure a
suitable and harmonious work environment. Any violation of expected
conduct shall be dealt with accordingly.</P>
<OL>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in">Always be mindful of
	the sound of your voice. Monitor how loudly you are speaking. This
	is especially critical when you are working in a cubicle-type of
	work place.</P>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in">Share only
	professional information and not gossip. In order to maintain
	professionalism keep all conversation in the office work-related.
	Discuss personal matters concerning work directly with the superior
	or with the management only.</P>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in">Keep your personal
	workplace clean and neat all the time.</P>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in">Use shared or common
	area with courtesy and respect.</P>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in">Organize your work
	by assessing what has been completed and what remains to be pending.</P>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in">Keep all sensitive
	or confidential documents locked and secured.</P>
</OL>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.25in; margin-bottom: 0in">
<B>VI Off-Duty Conduct</B></P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.25in; margin-bottom: 0in">
The company does not seek to meddle with personal off-duty conduct of
its employees however, certain off-duty conduct may affect directly
or indirectly the business of the Company.</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.25in; margin-top: 0.02in; margin-bottom: 0in; line-height: 100%">
Employees are strictly prohibited to visit any land based Casino.
Presence in any land based is directly  in conflict with the
Company&rsquo;s interest.</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.25in; margin-top: 0.02in; margin-bottom: 0in; line-height: 100%">
<BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.25in; margin-bottom: 0in">
Off-duty conduct of employees that adversely affect the Company which
are illegal or immoral will not be tolerated.</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.25in; margin-bottom: 0in">
Other employments are discouraged. Employees are expected to observe
loyalty to the Company and devote their time to their work.</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.25in; margin-bottom: 0in">
Employees are strictly prohibited to commit any of the following
acts:</P>
<OL>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in">Employment that is
	incompatible or in conflict with the employee&rsquo;s employment
	with the Company.</P>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in">Employment that
	affect the conduct of work or related activities that will require
	the use of tools or facilities of the Company for that employment</P>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in">Employment that
	directly and indirectly competes with the business of the Company. 
	</P>
</OL>
<P CLASS="western" ALIGN=JUSTIFY STYLE="text-indent: 0.25in; margin-bottom: 0in">
<B>V Confidentiality</B></P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.25in; margin-bottom: 0in">
Each employee is required to safeguard all confidential information
perceived or received during employment. All confidential information
should not be divulged or revealed unless required in the performance
of duty during employment in the Company. 
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.25in; margin-bottom: 0in">
Each employee is expected to commit into company confidentiality
which they have signed under their employment contract. 
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.25in; margin-bottom: 0in">
Any violation or breach of security involving confidential
information will not be tolerated and will be dealt with accordingly.<B>
</B>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><BR>
</P>
<P CLASS="western" ALIGN=CENTER STYLE="margin-bottom: 0in"><B>DISCIPLINARY
PROCEDURE</B></P>
<CENTER>
	<TABLE WIDTH=430 BORDER=1 BORDERCOLOR="#00000a" CELLPADDING=7 CELLSPACING=0>
		<COL WIDTH=53>
		<COL WIDTH=204>
		<COL WIDTH=128>
		<TR VALIGN=TOP>
			<TD WIDTH=53 HEIGHT=8>
				<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in"><BR>
				</P>
			</TD>
			<TD WIDTH=204>
				<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in">
				<FONT FACE="Calibri, serif"><B>Release Date:</B></FONT></P>
				<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in"><FONT FACE="Calibri, serif">February
				2012</FONT></P>
			</TD>
			<TD WIDTH=128>
				<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in">
				<FONT FACE="Calibri, serif"><B>Review Date:</B></FONT></P>
				<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in"><FONT FACE="Calibri, serif"><B>June
				2013</B></FONT></P>
			</TD>
		</TR>
		<TR VALIGN=TOP>
			<TD WIDTH=53 HEIGHT=8>
				<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in">
				<FONT FACE="Calibri, serif"><B>Version:</B></FONT></P>
				<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in"><FONT FACE="Calibri, serif"><B>1.0</B></FONT></P>
			</TD>
			<TD WIDTH=204>
				<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in">
				<FONT FACE="Calibri, serif"><B>Process Owner:</B></FONT></P>
				<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in"><FONT FACE="Calibri, serif">Human
				Resource </FONT>
				</P>
			</TD>
			<TD WIDTH=128>
				<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in">
				<FONT FACE="Calibri, serif"><B>Process Administrator:</B></FONT></P>
				<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in"><FONT FACE="Calibri, serif">Supervisors/HOD/HR</FONT></P>
			</TD>
		</TR>
	</TABLE>
</CENTER>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in"> 
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><U><B>Responsibilities</B></U></P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in">It is
primarily the responsibility of the immediate superior to ensure his
team members maintain high standard of professionalism and work
ethics. 
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in">All
managerial and supervisory employees are to practice the highest
standard of professionalism.  
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in">Immediate
superiors are expected to:</P>
<UL>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in">Commend and
	appreciate good behavior or exceptional work progress.</P>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in">Bring to attention
	deviant behavior.</P>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in">Implement sanctions
	when necessary based on clear agreements with the employees and in
	accordance with the procedure set out in the Code of Conduct.</P>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in">Not to tolerate or
	cover up for the wrong doing of his/her team members</P>
</UL>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in">In all
cases of infractions the immediate superior shall coordinate with HR
through HR Employee Relation personnel within twenty four (24) hours
from commission of the infraction for guidance, proper evaluation of
the legal implications of the case.</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in">The
failure of the immediate superior to perform the expectations
enumerated above shall make him liable for disciplinary actions under
the standard of command responsibility.</P>
<P CLASS="western" ALIGN=CENTER STYLE="margin-bottom: 0in"><I><B>Command
responsibility</B></I><I> is an </I><A HREF="http://en.wikipedia.org/wiki/Omission_%28criminal_law%29"><FONT COLOR="#00000a"><I><SPAN STYLE="text-decoration: none">omission
mode</SPAN></I></FONT></A><I> of individual administrative liability:
the superior is responsible for infractions committed by his members
for failing to prevent or subject them to disciplinary actions.</I></P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><B>OPERATING
PROCEDURES AND RESPONSIBILITIES</B></P>
<OL>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in">The provisions of
	the Code of Conduct are not intended as punitive action. The code
	applies a reformative and progressive approach in handling employees
	who have been deviant from the established behaviors generally to be
	observed in the work place.</P>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in">The provisions are
	considered as preventive measures to protect the employees and the
	Company for any untoward act.</P>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in">The Company reserves
	the right to consider both the aggravating and the mitigating
	circumstances in evaluating the merits of the case.</P>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in">The Code of Conduct
	is not exhaustive of the offenses or infractions that an employee
	may commit. In consideration of this, the Company reserves the right
	to invoke the provisions of other rules and regulations, policies
	and memoranda issued by the management, the Labor code of the
	Philippines and other pertinent laws.</P>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in">The imposition of
	the corrective action shall not preclude the Company to pursue civil
	and/or criminal case against the employee if the circumstances so
	warrant.</P>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in">The Company reserves
	the right to demand payment from the offender in cases where the
	damage to property occurs. This is in addition to the corrective
	action imposed. 
	</P>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in">When a single act or
	omission constitute two or more infractions or offenses, the
	corrective action applicable to the most serious infraction or
	offenses shall be imposed.</P>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in">In accordance with
	the intent and purpose of the law, any erring employees shall be
	given due process, wherein he/she will be afforded the chance to
	defend himself/herself prior to the evaluation of his or her case.</P>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in">For offenses
	committed outside the prescriptive period, the company reserves the
	right to review previous offenses similar in nature for its
	reference.</P>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in">The company reserves
	the right to alter, amend, modify or revise any provision or the
	entire policy as the exigencies of the times or circumstances may
	warrant. Any rules and regulation promulgated are deemed to
	supersede those inconsistent with them.</P>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in">The provisions of
	the Code of Conduct shall be deemed incorporated into an employee&rsquo;s
	employment contract and form part of the terms and conditions of
	payment. Ignorance of the Code of Conduct is not an excuse.</P>
</OL>
<P ALIGN=JUSTIFY STYLE="margin-left: 0.5in; margin-bottom: 0in"><BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><B>Classification
of Infractions:</B></P>
<OL>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in">Minor Offense is
	deviation which as a result of gravity of the offense committed a
	Verbal Counseling (VC) or Written reprimand (WR) was issued.</P>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in">Major Offense are
	deviations or repetition of minor offenses within the prescriptive
	period that warrants a Suspension or Termination</P>
</OL>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><U><B>Types
of Corrective Actions</B></U></P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in">Corrective
actions are graduated according to the gravity of offense committed,
frequency of violation, the resulting damages and similar attending
factors.</P>
<OL TYPE=a>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><B>Verbal Counseling</B></P>
</OL>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in">Process
involving a one-on-one counseling session between the employee and
his/her immediate supervisor/superior where in:</P>
<UL>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in">The supervisor will
	point out the infraction/s committed by the employee.</P>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in">The areas or aspects
	that will need improvement in order to avoid committing the same
	infraction/s.</P>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in">The resolution/s
	agreed by both parties.</P>
</UL>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in">Document:
Counseling Form</P>
<OL TYPE=a START=2>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><B>Written Reprimand</B></P>
</OL>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in">A formal
written notice for violation of the Code of Conduct where in the
penalty will be documented and filed in 201. 
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in">Documents:</P>
<OL>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in">Cite form</P>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in">Notice to Explain 
	</P>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in">Notice of
	Disciplinary Action</P>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in">Other supporting and
	pertinent documents 
	</P>
</OL>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in"> *All
documents should be acknowledged and copy furnished 201 file. This is
to be verified by HR Employee Relation.</P>
<OL TYPE=a START=3>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><B>Suspension</B></P>
</OL>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in">A
corrective action implemented for serious violation of the Code of
Conduct whereby the employee is not permitted to work for a specified
period without pay.</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in">Documents:</P>
<OL>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in">Cite form</P>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in">Notice to Explain 
	</P>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in">Notice of
	Disciplinary Action</P>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in">Record of the
	hearing conducted by the Disciplinary Committee.</P>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in">Other supporting and
	pertinent documents 
	</P>
</OL>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in"> *All
documents should be acknowledged and copy furnished 201 file. This is
to be verified by HR Employee Relation.HR Compensation and Benefits
will include the suspension period as payroll data for the covered
payroll period.</P>
<P ALIGN=JUSTIFY STYLE="margin-left: 0.5in; margin-bottom: 0in"><BR>
</P>
<P ALIGN=JUSTIFY STYLE="margin-left: 0.5in; margin-bottom: 0in"><BR>
</P>
<P ALIGN=JUSTIFY STYLE="margin-left: 0.5in; margin-bottom: 0in"><BR>
</P>
<P ALIGN=JUSTIFY STYLE="margin-left: 0.5in; margin-bottom: 0in"><BR>
</P>
<P ALIGN=JUSTIFY STYLE="margin-left: 0.5in; margin-bottom: 0in"><BR>
</P>
<P ALIGN=JUSTIFY STYLE="margin-left: 0.5in; margin-bottom: 0in"><BR>
</P>
<OL TYPE=a START=4>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><B>Termination</B></P>
</OL>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in">A
corrective action implemented for serious violation of the Code of
Conduct whereby the employer-employee relationship is severed.</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in">Documents:</P>
<OL>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in">Cite form</P>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in">Notice to Explain 
	</P>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in">Notice of
	Disciplinary Action</P>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in">Record of the
	hearing conducted by the Disciplinary Committee.</P>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in">Other supporting and
	pertinent documents 
	</P>
</OL>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in">*All
documents should be acknowledged and copy furnished 201 file. This is
to be verified by HR Employee Relation.</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><I><U><B>Disciplinary
Process</B></U></I></P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.25in; margin-bottom: 0in">
To ensure the fairness and objectivity; the disciplinary process
shall be strictly be applied in dealing with the alleged violations
of the Code of Conduct.</P>
<OL>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><B>Notification</B></P>
</OL>
<OL TYPE=a>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in">Every employee who
	has allegedly committed an infraction, regardless of the gravity,
	has the right to be informed of the offense he has committed before
	the superior recommends or serve him a disciplinary action</P>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in">Upon knowledge of an
	offense or an incident, the employee&rsquo;s immediate superior
	shall conduct initial investigation to determine if there was indeed
	a non- conformance.</P>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in">The result of the
	initial investigation will aid the immediate superior in deciding
	the gravity of the offense and its corresponding sanction:</P>
</OL>
<P ALIGN=JUSTIFY STYLE="margin-left: 0.5in; margin-bottom: 0in"><BR>
</P>
<UL>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><B>Verbal Counseling</B>
	&ndash; Upon knowledge of an offense or an incident, the employee&rsquo;s
	immediate superior shall conduct initial investigation  to determine
	if there was indeed a non- conformance, if there was an infraction
	committed, a CITE form shall be issued within 24 hours together with
	the Verbal Counseling form and copy furnished HR Employee Relation. 
	</P>
</UL>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.25in; text-indent: 0.5in; margin-bottom: 0in">
<I><B>Time Frame 24 hours (1days) </B></I>
</P>
<UL>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><B>Written Reprimand</B>
	&ndash; Upon knowledge of an offense or an incident, the employee&rsquo;s
	immediate superior shall conduct initial investigation to determine
	if there was indeed a non- conformance. If there was an infraction
	committed, a CITE form shall be issued within 24 hours together with
	a Notice to Explain. An employee shall be given 24 -48 hours to
	explain his side a decision shall be made by the immediate
	supervisor within 24 hours thereafter. 
	</P>
</UL>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.75in; margin-bottom: 0in">
<I><B>Time Frame not more than 48 hours (2 days). </B></I>
</P>
<UL>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><B>Suspension and
	Termination</B> - Upon knowledge of an offense or an incident, the
	employee&rsquo;s immediate superior shall conduct initial
	investigation to determine if there was indeed a non- conformance.
	The investigation shall be conducted strictly in consultation with
	an HR ER officer. The employee shall be given not less than 72 hours
	to explain his side for infraction with the penalty of Suspension
	and not less than 5 days to explain his side for infraction with the
	penalty of Dismissal.</P>
</UL>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.75in; margin-bottom: 0in">
<I><B>Time Frame not more than 72 hours (5 days). </B></I>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.75in; margin-bottom: 0in">
A <U>disciplinary committee</U> shall be formed as needed by the
Manager of the Human Resource Department. The power of the committee
is recommendatory in nature.</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.75in; margin-bottom: 0in">
When the committee convened. The power to dismiss rest with the
manager, however if there should only be preponderance of evidence 
and these do not sufficiently establish either employee&rsquo;s guilt
or innocence, the manager of human resource may call on the committee
to conduct thorough inquiry.</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.75in; margin-bottom: 0in">
<B>Guidelines for the Disciplinary Committee:</B></P>
<OL TYPE=a>
	<OL>
		<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in">The manager of the
		Human resource Department shall list the name of seven
		disinterested person which are possible members of the Disciplinary
		Committee.</P>
		<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in">The committee shall
		have 3 members which shall be chosen by the respondent.</P>
		<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in">Position level of
		the member of the committee shall not be lower than the respondent.</P>
		<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in">A representative of
		Human resource shall be present but not participating or be a part
		of the committee. His/her presence shall only be utilized to
		facilitate the meeting.</P>
		<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in">The recommendations
		of the Disciplinary Committee shall be given to the manager of the
		employee who shall issue a decision within 24 hours from receipt.  
		</P>
	</OL>
</OL>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.25in; margin-bottom: 0in">
If the violator poses a serious imminent threat to property,
interests or services of the company or his co employee, or if his
presence would adversely affect the investigation, the employee
concern maybe subjected to preventive suspension.</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.25in; margin-bottom: 0in">
The immediate superior shall inform HR Employee Relations and Payroll
regarding this. 
</P>
<OL START=2>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><B>Investigation</B></P>
</OL>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.25in; margin-bottom: 0in">
It is imperative that the immediate superior should conduct a
thorough investigation upon receiving the employee reply or when the
time the employee period to respond prescribe.</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.25in; margin-bottom: 0in">
If there should only be preponderance of evidence and these do not
sufficiently establish either employee&rsquo;s guilt or innocence,
the manager of Human Resource may call on the committee to conduct
thorough inquiry.</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.25in; margin-bottom: 0in">
The investigative inquiry shall be conducted within 48 hours upon
receipt of the documents and shall not last more than 3 days upon
commencement</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 1in; margin-bottom: 0in">
In the interest of fairness, the investigation shall proceed as
follows:</P>
<OL>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in">Interview the
	employee</P>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in">Interview/ask anyone
	involved or who may have knowledge of anything related to the case.</P>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in">Allow employee to
	bring forth his witness.</P>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in">All investigation
	shall be out in writing and will be part of the case in record.</P>
</OL>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><U><B>Preventive
Suspension</B></U></P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in">If the
violator poses a serious imminent threat to property, interests or
services of the company or his co -employee, or if his presence would
adversely affect the investigation, the employee concern maybe
subjected to preventive suspension. The immediate superior shall
inform HR Employee Relations regarding this. 
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in">After 30
days the employee should be reinstated to his or her former position
or in a substantially equivalent position. The employer however may
extend the period of suspension provided that the employee is paid
his or her wages.</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in">If the
employee is dismissed after the investigation, the employee is not
bound to reimburse the amount to him during the period of extension.</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in">Preventive
suspension is not a disciplinary measure, and   should be
distinguished from imposed penalty.</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.75in; margin-bottom: 0in">
<BR>
</P>
<OL START=3>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><B>Review and
	Decision</B></P>
</OL>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.25in; margin-bottom: 0in">
In investigation and deciding on a case, the following factors should
serve as guide to the direct immediate superior if he should impose a
penalty higher or lower than the provided table of offense.</P>
<OL>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in">Gravity of the
	offense</P>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in">Impact on the client</P>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in">Extent of the
	negligence</P>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in">Employee past
	disciplinary record</P>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in">Performance record</P>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in">Other element that
	may mitigate or aggravate the offense</P>
</OL>
<P ALIGN=JUSTIFY STYLE="margin-left: 1in; margin-bottom: 0in"><BR>
</P>
<P ALIGN=JUSTIFY STYLE="margin-left: 1in; margin-bottom: 0in"><BR>
</P>
<OL START=4>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><B>Decision</B></P>
</OL>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.25in; margin-bottom: 0in">
If the immediate superior find out that indeed a violation of the
Code of Conduct was committed and that a sanction must be imposed he
must accomplished a Notice of Disciplinary Action.</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.25in; margin-bottom: 0in">
If the employee is cleared from the offense the superior officer must
still accomplished a Notice of Disciplinary Action stating that the
employee was cleared.</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.25in; margin-bottom: 0in">
Prior to the investigation the superior officer must first discuss
with the required level of authority:</P>
<TABLE WIDTH=649 BORDER=1 BORDERCOLOR="#00000a" CELLPADDING=7 CELLSPACING=0>
	<COL WIDTH=141>
	<COL WIDTH=142>
	<COL WIDTH=164>
	<COL WIDTH=145>
	<TR VALIGN=TOP>
		<TD WIDTH=141 HEIGHT=5>
			<P CLASS="western" ALIGN=CENTER><B>Cleared</B></P>
		</TD>
		<TD WIDTH=142>
			<P CLASS="western" ALIGN=CENTER STYLE="margin-bottom: 0in"><B>Oral
			Reprimand</B></P>
			<P CLASS="western" ALIGN=CENTER><BR>
			</P>
		</TD>
		<TD WIDTH=164>
			<P CLASS="western" ALIGN=CENTER><B>Suspension</B></P>
		</TD>
		<TD WIDTH=145>
			<P CLASS="western" ALIGN=CENTER><B>Dismissal</B></P>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD WIDTH=141 HEIGHT=5>
			<P CLASS="western" STYLE="margin-bottom: 0in">Immediate Superior</P>
			<P CLASS="western" STYLE="margin-bottom: 0in">Department Head</P>
			<P CLASS="western" STYLE="margin-bottom: 0in">Line HR Executive</P>
			<P CLASS="western" STYLE="margin-bottom: 0in">HR-Admin Manager.</P>
			<P CLASS="western"><BR>
			</P>
		</TD>
		<TD WIDTH=142>
			<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in">Immediate
			Superior</P>
			<P CLASS="western" STYLE="margin-bottom: 0in">Department Head</P>
			<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in">Line
			HR Executive</P>
			<P CLASS="western">HR-Admin Manager 
			</P>
		</TD>
		<TD WIDTH=164>
			<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in">Immediate
			Superior</P>
			<P CLASS="western" STYLE="margin-bottom: 0in">Department Head</P>
			<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in">Line
			HR Executive</P>
			<P CLASS="western" ALIGN=JUSTIFY>HR-Admin Manager 
			</P>
		</TD>
		<TD WIDTH=145>
			<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in">Immediate
			Superior</P>
			<P CLASS="western" STYLE="margin-bottom: 0in">Department Head</P>
			<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in">Line
			HR Executive</P>
			<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in">Human
			Resource Mgr.</P>
			<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in">Head
			of Operations</P>
			<P CLASS="western" ALIGN=JUSTIFY><BR>
			</P>
		</TD>
	</TR>
</TABLE>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.25in; margin-bottom: 0in">
		</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in">Q:
Whom do I contact if I have any questions?</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.25in; margin-bottom: 0in">
A: HR- Employee Relation 
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in">Q: Whom
do I escalate to?</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.25in; margin-bottom: 0in">
A: HR-Admin Manager</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; text-decoration: none">
<BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; text-decoration: none">
<BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; text-decoration: none">
<BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; text-decoration: none">
<BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; text-decoration: none">
<BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; text-decoration: none">
<BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; text-decoration: none">
<BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; text-decoration: none">
<BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; text-decoration: none">
<BR>
</P>
<P CLASS="western" ALIGN=CENTER STYLE="margin-bottom: 0in"><FONT COLOR="#00000a"><SPAN STYLE="text-decoration: none"><B>GRIEVANCE
HANDLING POLICY</B></SPAN></FONT></P>
<CENTER>
	<TABLE WIDTH=430 BORDER=1 BORDERCOLOR="#00000a" CELLPADDING=7 CELLSPACING=0>
		<COL WIDTH=53>
		<COL WIDTH=204>
		<COL WIDTH=128>
		<TR VALIGN=TOP>
			<TD WIDTH=53 HEIGHT=8>
				<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in"><BR>
				</P>
			</TD>
			<TD WIDTH=204>
				<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in">
				<B>Release Date:</B></P>
				<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in">February
				2012</P>
			</TD>
			<TD WIDTH=128>
				<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in">
				<B>Review Date:</B></P>
				<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in"><B>June
				2013</B></P>
			</TD>
		</TR>
		<TR VALIGN=TOP>
			<TD WIDTH=53 HEIGHT=8>
				<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in">
				<B>Version:</B></P>
				<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in"><B>1.0</B></P>
			</TD>
			<TD WIDTH=204>
				<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in">
				<B>Process Owner:</B></P>
				<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in">Human
				Resource 
				</P>
			</TD>
			<TD WIDTH=128>
				<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in">
				<B>Process Administrator:</B></P>
				<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in">Supervisors/HOD/HR</P>
			</TD>
		</TR>
	</TABLE>
</CENTER>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><U><B>Objective</B></U></P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><FONT COLOR="#000000">The
intent of this policy is to ensure that there is a fair and time
bound system of handling employee grievances. This is to ensure that
there is a fair and time-bound system of handling employee
grievances.</FONT></P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><FONT COLOR="#000000"><U><B>Scope</B></U></FONT></P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><FONT COLOR="#000000">All
employees are covered under this policy. </FONT>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><FONT COLOR="#000000"><U><B>Definition</B></U></FONT></P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><FONT COLOR="#000000">Grievance
</FONT> any discontent or dissatisfaction, whether expressed or not,
whether valid or not, and arising out of anything connected with the
company that an employee thinks, believes, or even feels as unfair,
unjust, or inequitable.</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><U><B>Guidelines</B></U></P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in">The first
contact point for any grievance should be the immediate superior. The
immediate superior should discuss the grievance as soon as possible.</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in">Employees
are encouraged to speak to their immediate superior of any grievance
they are experiencing.</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in">The
grievance can be written or unwritten, however anonymous mail are
discouraged and will not be entertained.</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in">The
superior should commit a period as to the feedback regarding the
status of the grievance.</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in">The
immediate superior must not commit or make comments beyond the policy
and should contact HR if help is needed in the interpretation of the
policy.</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in">A
&ldquo;reality check&rdquo; should be provided to an employee when
needed, this is to correct the perception of the employee. Sometimes
his grievance is based on wrong information or expectation and
therefore providing an employee some sense of reality becomes
necessary.</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in">If the
grievance is regarding an immediate superior, the employee must
approach the next higher in rank. HR may be involved in any stage of
the grievance handling, if the employee so requires.</P>
<P CLASS="western" STYLE="margin-bottom: 0in">Collective grievances
shall be handled by the Department Head together with HR.</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><U><B>Process
 </B></U>
</P>
<OL>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in">Aggrieved party can
	take the following steps:</P>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in">The aggrieved
	employee should come to his immediate superior regarding his
	grievance/s. At this stage the immediate superiors should exert all
	effort to resolve the grievance. 
	</P>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in">An <B>Incident
	Report Form</B> shall be accomplished whenever necessary.</P>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in">If the grievance is
	not resolved the employee can approach the next level management. At
	this level, the employees shall at all-time put down his grievance
	in writing.</P>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in">The next level
	management shall review the grievance and discuss it with the
	aggrieved employee.</P>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in">If the decision is
	still not resolved the employee can go directly to the HR Manager.
	The decision of the HR Manager is considered as final and
	immediately executor.</P>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in">Period to resolve:
	At every level it should be 3 days from the time the employee aired
	his grievance in the prescribed form. In cases, where the required
	period cannot me fulfilled the employee shall be given an
	approximate period for the resolution which should not be more than
	10 days.</P>
</OL>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in">In cases
where there are financial implications, the Operation Head and HR
Manager shall be involved and their decision is final.</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.25in; margin-bottom: 0in">
<BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in">Q:
Whom do I contact if I have any questions?</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.25in; margin-bottom: 0in">
A: Immediate Supervisor</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in">Q: Whom
do I escalate to?</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.25in; margin-bottom: 0in">
A: HR-Employee Relation</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><BR>
</P>
<P CLASS="western" ALIGN=CENTER STYLE="margin-bottom: 0in"><B>SEXUAL
HARASSMENT POLICY</B></P>
<CENTER>
	<TABLE WIDTH=430 BORDER=1 BORDERCOLOR="#00000a" CELLPADDING=7 CELLSPACING=0>
		<COL WIDTH=53>
		<COL WIDTH=204>
		<COL WIDTH=128>
		<TR VALIGN=TOP>
			<TD WIDTH=53 HEIGHT=8>
				<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in"><BR>
				</P>
			</TD>
			<TD WIDTH=204>
				<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in">
				<B>Release Date:</B></P>
				<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in">February
				2012</P>
			</TD>
			<TD WIDTH=128>
				<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in">
				<B>Review Date:</B></P>
				<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in"><B>June
				2013</B></P>
			</TD>
		</TR>
		<TR VALIGN=TOP>
			<TD WIDTH=53 HEIGHT=8>
				<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in">
				<B>Version:</B></P>
				<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in"><B>1.0</B></P>
			</TD>
			<TD WIDTH=204>
				<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in">
				<B>Process Owner:</B></P>
				<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in">Human
				Resource 
				</P>
			</TD>
			<TD WIDTH=128>
				<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in">
				<B>Process Administrator:</B></P>
				<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in">Supervisors/HOD/HR</P>
			</TD>
		</TR>
	</TABLE>
</CENTER>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><U><B>Objective</B></U></P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in">This
policy and these procedures aim to inform the employees what sexual
harassment is and what they can do should they encounter or observe
it.</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in">Pacific
Sea BPO Services Inc. is committed to providing a workplace that is
free from sexual harassment. Sexual harassment in the workplace is
against the law and will not be tolerated. When the Company
determines that an allegation of sexual harassment is credible, it
will take prompt and appropriate corrective action.</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><U><B>Scope</B></U></P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in">All
employees of Pacific Sea BPO Services Inc.</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><U><B>Definition</B></U></P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0.02in; line-height: 100%">
<B>Sexual Harassment</B></P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0.02in; line-height: 100%">
Unwelcome sexual advances, requests for sexual favors, and other
verbal or physical conduct of a sexual nature constitute sexual
harassment when: 
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.5in; margin-top: 0.02in; margin-bottom: 0.02in; line-height: 100%">
1)&nbsp; An employment decision affecting that individual is made
because the individual submitted to or rejected the unwelcome
conduct; or</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.5in; margin-top: 0.02in; margin-bottom: 0.02in; line-height: 100%">
2)&nbsp; The unwelcome conduct unreasonably interferes with an
individual's work performance or creates an intimidating, hostile, or
abusive work environment. 
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0.02in; line-height: 100%">
Certain behaviors, such as conditioning promotions, awards, training
or other job benefits upon acceptance of unwelcome actions of a
sexual nature, are always wrong.</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0.02in; line-height: 100%">
Unwelcome actions such as the following are inappropriate and,
depending on the circumstances, may in and of themselves meet the
definition of sexual harassment or contribute to a hostile work
environment:</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0.02in; line-height: 100%">
<BR><BR>
</P>
<UL>
	<LI><P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0.02in; line-height: 100%">
	Sexual pranks, or repeated sexual teasing, jokes, or innuendo, in
	person or via e-mail;</P>
	<LI><P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0.02in; line-height: 100%">
	Verbal abuse of a sexual nature;</P>
	<LI><P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0.02in; line-height: 100%">
	Touching or grabbing of a sexual nature;</P>
	<LI><P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0.02in; line-height: 100%">
	Repeatedly standing too close to or brushing up against a person;</P>
	<LI><P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0.02in; line-height: 100%">
	Repeatedly asking a person to socialize during off-duty hours when
	the person has said no or has indicated he or she is not interested
	(supervisors in particular should be careful not to pressure their
	employees to socialize); 
	</P>
	<LI><P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0.02in; line-height: 100%">
	Giving gifts or leaving objects that are sexually suggestive;</P>
	<LI><P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0.02in; line-height: 100%">
	Repeatedly making sexually suggestive gestures;</P>
	<LI><P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0.02in; line-height: 100%">
	Making or posting sexually demeaning or offensive pictures, cartoons
	or other materials in the workplace; 
	</P>
	<LI><P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0.02in; line-height: 100%">
	Off-duty, unwelcome conducts of a sexual nature that affects the
	work environment. 
	</P>
</UL>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0.02in; line-height: 100%">
A victim of sexual harassment can be a man or a woman. The victim can
be of the same sex as the harasser. The harasser can be a supervisor,
co-worker, other Company employee, or a non-employee who has a
business relationship with the Company.</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
<B>Complaint Redressal Committee</B></P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
<BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
A Committee has been constituted by the Management to consider and
redress complaints of Sexual Harassment. 
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
<BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
The Chairman and Members of the Committee are as follows:</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
<BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.5in; margin-bottom: 0in; line-height: 100%">
Committee:</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.5in; margin-bottom: 0in; line-height: 100%">
<BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.5in; margin-bottom: 0in; line-height: 100%">
1. Chairperson</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.5in; margin-bottom: 0in; line-height: 100%">
2. Member</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.5in; margin-bottom: 0in; line-height: 100%">
3. Member</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.5in; margin-bottom: 0in; line-height: 100%">
4. Member</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
<BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
A quorum of 3 members is required to be present for the proceedings
to take place. The quorum shall include the Chairperson, at least two
members, one of whom shall be a lady.</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
<BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
<B>Redressal Process</B></P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
 
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
Any employee who feels and is being sexually harassed directly or
indirectly may submit a complaint of the alleged incident to any
member of the Committee in writing with his/her signature within 10
days of occurrence of incident.</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
<BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
The Committee will maintain a register to endorse the complaint
received by it and keep the contents confidential, if it is so
desired, except to use the same for discreet investigation.</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
<BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
The Committee will hold a meeting with the Complainant within five
days of the receipt of the complaint, but not later than a week in
any case.</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
<BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
At the first meeting, the Committee members shall hear the
Complainant</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
and record her/his allegations. 
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
<BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
The Complainant can also submit any corroborative material with a
documentary proof, oral or written material, etc., to substantiate
his / her complaint. 
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
If the Complainant does not wish to depose personally due to
embarrassment of narration of event, a lady officer for lady
employees involved and a male officer for male employees, involved
shall meet and record the statement.</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
<BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
Thereafter, the person against whom complaint is made may be called
for a deposition before the Committee and an opportunity will be
given to him/ her to give an explanation, where after, an &ldquo;Inquiry&rdquo;
shall be conducted and concluded.</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
<BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
In the event, the complaint does not fall under the purview of Sexual
Harassment or the complaint does not mean an offense of Sexual
Harassment, the same would be dropped after recording the reasons
thereof.</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
<BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
In case the complaint is found to be false, the Complainant shall, if
deemed fit, be liable for appropriate disciplinary action by the
Management.</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
<B>Inquiry Process</B></P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
<BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
The Committee shall immediately proceed with the Inquiry and
communicate the same to the Complainant and person against whom
complaint is made.</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
<BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
The Committee shall prepare and hand over the Statement of Allegation
to the person against whom complaint is made and give him / her
opportunity to submit a written explanation if she / he so desires
within 7days of receipt of the same.</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
<BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
The Complainant shall be provided with a copy of the written
explanation submitted by the person against whom complaint is made.</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
<BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
If the Complainant or the person against whom complaint is made
desires any witness/es to be called, they shall communicate in
writing to the Committee the names of witness/es that they propose to
call.</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
<BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
If the Complainant desires to tender any documents by way of evidence
before the Committee, she / he shall supply original copies of such
documents. Similarly, if the person against whom complaint is made
desires to tender any documents in evidence before the Committee he
/she shall supply original copies of such documents. Both shall affix
his /her signature on the respective documents to certify these to be
original copies.</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
<BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
The Committee shall call upon all witnesses mentioned by both the
parties.</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
<BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
The Committee shall provide every reasonable opportunity to the
Complainant and to the person against whom complaint is made, for
putting forward and defending their respective case.</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
<BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
The Committee shall complete the inquiry within reasonable period but
not beyond one month and communicate its findings and its
recommendations for action to the HR Manage. 
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
<BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
The report of the committee shall be treated as an Inquiry report on
the basis of which an erring employee can be awarded appropriate
punishment straightaway.</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
<BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
The HR Manager will direct appropriate action in accordance with the
recommendation proposed by the Committee.</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
<BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
<B>Other Points to Be Considered</B></P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
<BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
The Committee may recommend to the HR Manager action which may
include transfer or any of the other appropriate disciplinary action
in accordance with the Code of Conduct.</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
<BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
The management shall provide all necessary assistance for the purpose
of ensuring full, effective and speedy implementation of this policy.</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
<BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
Where sexual harassment occurs as a result of an act or omission by
any third party or outsider, Pacific Sea BPO Services Inc. shall take
all steps necessary and reasonable to assist the affected person in
terms of support and preventive action.</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
<BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
The Committee shall analyze and put up report on all complaints of
this nature at the end of the year for submission to HR Manager.</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
<BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in">In case
the Committee find the degree of offense covered under the REPUBLIC
ACT NO. 7877 AN ACT DECLARING SEXUAL HARASSMENT UNLAWFUL IN
THE&nbsp;EMPLOYMENT, EDUCATION OR TRAINING ENVIRONMENT, AND FOR&nbsp;OTHER
PURPOSES, then this fact shall be mentioned in its report and
appropriate action shall be initiated by the Management, for making a
Legal Complaint<FONT FACE="Arial, serif">.</FONT></P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.25in; margin-bottom: 0in">
<BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in">Q:
Whom do I contact if I have any questions?</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.25in; margin-bottom: 0in">
A: Complaint Redressal Committee</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in">Q: Whom
do I escalate to?</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.25in; margin-bottom: 0in">
A: HR-Admin Manager</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><BR>
</P>
<P CLASS="western" ALIGN=CENTER STYLE="margin-bottom: 0in"><B>ALCOHOL
AND SUBSTANCE ABUSE POLICY</B></P>
<CENTER>
	<TABLE WIDTH=430 BORDER=1 BORDERCOLOR="#00000a" CELLPADDING=7 CELLSPACING=0>
		<COL WIDTH=53>
		<COL WIDTH=204>
		<COL WIDTH=128>
		<TR VALIGN=TOP>
			<TD WIDTH=53 HEIGHT=8>
				<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in"><BR>
				</P>
			</TD>
			<TD WIDTH=204>
				<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in">
				<B>Release Date:</B></P>
				<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in">February
				2012</P>
			</TD>
			<TD WIDTH=128>
				<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in">
				<B>Review Date:</B></P>
				<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in"><B>June
				2013</B></P>
			</TD>
		</TR>
		<TR VALIGN=TOP>
			<TD WIDTH=53 HEIGHT=8>
				<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in">
				<B>Version:</B></P>
				<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in"><B>1.0</B></P>
			</TD>
			<TD WIDTH=204>
				<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in">
				<B>Process Owner:</B></P>
				<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in">Human
				Resource 
				</P>
			</TD>
			<TD WIDTH=128>
				<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in">
				<B>Process Administrator:</B></P>
				<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in">Supervisors/HOD/HR</P>
			</TD>
		</TR>
	</TABLE>
</CENTER>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><U><B>Introduction</B></U></P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in">1.
Pacific Sea BPO Services Inc. recognizes that alcohol and drug abuse
related problems are an area of health and social concern. It also
recognizes that an employee with such problems needs help and support
from his / her employer.</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in">2. The
Company also recognizes that alcohol and drug abuse problems can have
a detrimental effect on work performance and behavior. The Company
has a responsibility to its employees and customers to ensure that
this risk is minimized.</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in">3.
Accordingly, Company policy involves two approaches</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.5in; margin-bottom: 0in">
&bull;Providing reasonable assistance to the employee with an alcohol
or drug abuse problem who is willing to co-operate in treatment for
that problem.</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.5in; margin-bottom: 0in">
&bull;Disciplinary rules, enforced through disciplinary procedures,
where use of alcohol or drugs (other than on prescription) affects
performance or behavior at work, and where either (1) an alcohol or
drug dependency problem does not exist or (2) where treatment is not
possible or has not succeeded. 
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in">4. The
Company has not the internal resources to provide or arrange
treatment or other forms of specialist assistance. Such services are
provided by GPs, hospitals and other agencies. Through this policy
the Company will seek both to assist an employee in obtaining such
specialist help, and to protect his/her employment.</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><B>Assistance
for a Member of Staff</B></P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in">1. The
Company will, where possible, provide the following assistance to an
employee:</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.5in; margin-bottom: 0in">
&bull;Helping the employee to recognize the nature of the problem,
through referral to a qualified diagnostic or counseling service.</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.5in; margin-bottom: 0in">
&bull;Support during a period of treatment. This may include a period
of sick leave or approved other leave, continuation in post or
transfer to other work, depending upon what is appropriate in terms
of the employee member's condition and needs of the Company.</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.5in; margin-bottom: 0in">
&bull;The opportunity to remain or return to work following the
completion of a course of treatment, as far as is practicable, in
either the employee's own post or an alternative post.</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in">2. The
Company's assistance will depend upon the following conditions being
met:</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.5in; margin-bottom: 0in">
&bull;The Occupational Health Service / Company Approved Doctor
diagnose an alcohol or drug dependency related problem.</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.5in; margin-bottom: 0in">
&bull;The employee recognizes that he/she is suffering from an
alcohol or drug abuse problem and is prepared to co-operate fully in
referral and treatment from appropriate sources.</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in">3. The
Company and its employees must recognize the following limits to the
assistance the Company can provide:</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.5in; margin-bottom: 0in">
&bull;Where an employee fails to co-operate in referral or treatment
arrangements, no special assistance will be given and any failure in
work performance and behavior will be dealt with through the
Disciplinary Procedure.</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.5in; margin-bottom: 0in">
&bull;If the process of referral and treatment is completed but is
not successful, and failure in work performance or behavior occurs,
these will be dealt with through the Disciplinary Procedure.</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.5in; margin-bottom: 0in">
&bull;An employee continuation in his/her post or an alternative post
during or after treatment will depend upon the needs of the Company
at that time.</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><U><B>Disciplinary
Action</B></U></P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in">1. In
line with the Company's disciplinary rules, the following will be
regarded as serious misconduct:</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.5in; margin-bottom: 0in">
A) Attending work and/or carrying our duties under the influence of
alcohol or drugs.</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.5in; margin-bottom: 0in">
B) Consumption of alcohol or drugs whilst on duty (other than where
prescribed or approval has been given).</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in">Breach of
these rules will normally result in summary dismissal, and only in
exceptional cases will either notice or the reduced disciplinary
action of a suspension will be applied.</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in">2. Where
a breach of these rules occurs, but it is established that an alcohol
or drug abuse related problem exists, and the employee is willing to
co-operate in referral to an appropriate service and subsequent
treatment, the Company will suspend application of the Disciplinary
Procedure and provide assistance as described above. Employees who do
not comply with the treatment suggested or continue to abuse alcohol
or drugs will be subjected to the application of the Disciplinary
Policy.</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><U><B>Nature
of the Procedures</B></U></P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in">1. The
procedures define management responsibilities and provide guidelines
on:</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 1in; text-indent: -0.5in; margin-bottom: 0in">
a) Where assistance to an employee should be provided and the nature
of and limits to such assistance.</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.5in; margin-bottom: 0in">
b) The application of the Company's Disciplinary Procedure.</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in">2.
Through the Occupational Health Service / Approved Company Doctor the
Company will provide:</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.5in; margin-bottom: 0in">
a) Advice and support to managers on</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 1in; margin-bottom: 0in">
i) Whether an alcohol or drug related problem exists</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 1in; margin-bottom: 0in">
ii) Progress in treatment</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 1in; margin-bottom: 0in">
iii) Re-establishment or continuation at work of an employee or other
appropriate arrangements.</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.5in; margin-bottom: 0in">
b) Assistance to members of employee with alcohol or drug abuse
related problems.</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in">3. This
does not include directly providing treatment or specialist help
which is the responsibility of GPs, hospitals and other agencies
working in the field. The Occupational Health Service / Company
Approved Doctor, in close liaison with these persons and agencies,
will assist employee referred in the following ways:</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 1in; text-indent: -0.5in; margin-bottom: 0in">
a) Through counseling encourage them to come to a better
understanding of their problem and the benefits of seeking treatment
or help;</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.5in; margin-bottom: 0in">
b) Providing advice and direction regarding obtaining treatment and
specialist help;</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.5in; margin-bottom: 0in">
c) Assisting in continuing at or achieving a return to work.</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in">4.
Alcohol or drug abuse related problems can come to the notice of
management through:</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.5in; margin-bottom: 0in">
a) Failures in work performance or behavior necessitating use of the
Disciplinary Procedure. In such situations the procedure described
above should be followed.</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.5in; margin-bottom: 0in">
b) Other means, where an employee seeks or agrees to accept
assistance on a voluntary basis. In such situations, the procedures
described above should be followed.</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><U><B>Situations
where use of the Disciplinary Procedure is Appropriate</B></U></P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in">Recognition
of the existence of a possible alcohol or drug abuse problem.</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in">1. Abuse
of alcohol or drugs can affect performance and behavior at work,
i.e., either through serious misconduct at work, (where there is a
direct and demonstrable breach of the disciplinary rules regarding
alcohol or drug abuse at work), or where there is a falling off of
standards of work performance or behavior, and abuse of alcohol or
drugs is a possible cause.</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in">2. The
immediate supervisor will be responsible for responding to such
situations, carrying out either counseling or disciplinary
investigations and interviews, supported as appropriate by a more
senior Manager.</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in">3. In
such interviews the possible existence of an alcohol or drug abuse
problem should be explored. The line manager is not required to
diagnose the existence of an alcohol or drug abuse problem, merely to
assess whether such abuse is a possible factor.</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in">4. Any
requirements of the Disciplinary Procedure regarding allowing the
employee representation will be observed.</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><U><B>Diagnosing
the existence of an alcohol or drug abuse problem</B></U></P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in">1. Should
the interviews lead to the conclusion that an alcohol or drug abuse
problem might exist and the employee accepts referral, the manager
should refer the matter to the Occupational Health / Company Approved
Doctor, who will be responsible for establishing whether or not a
diagnosis of alcoholism or drug dependence can be made. 
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in">2.
Disciplinary action should be suspended until diagnostic advice is
obtained. Where appropriate, suspension arrangements in the
Disciplinary Procedure should be followed.</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in">3. If the
interview fails to lead to the conclusion that an alcohol or drug
abuse problem exists, or the employee rejects, or fails to co-operate
in referral, disciplinary action should be continued, where and as
the situation justifies.</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><U>
</U><U><B>Confirmation that an alcohol or drug abuse problem exists
and treatment arrangements</B></U></P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in">1. If a
positive diagnosis of an alcohol or drug abuse problem is made, and
the employee agrees to co-operate in treatment, treatment
arrangements should commence.</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in">2. Where
necessary, the Occupational Health Service / Company Approved Doctor
will advise the employee regarding treatment and will be responsible
for monitoring progress with treatment and advising the manager
concerned. This advice should be available at least monthly following
commencement of treatment and thereafter as appropriate.
(Disciplinary action should be discontinued unless the employee fails
to co-operate on the treatment arranged.) Should a diagnosis of
alcoholism or drug dependence not be confirmed or should the employee
refuse to co-operate in treatment, disciplinary action should be
continued.</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in">3.The
Occupational Health Service / Company Approved Doctor will advise on
whether a situation has been reached where there is a lack of
progress with treatment or lack of co-operation by the employee.
Managers must review the facts and consider whether or not there
needs to be a return to the use of Disciplinary Procedures.</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in">4. Where
medical certificates are submitted, sick leave should be given.
Should the employee continue to be fit for work during the period of
treatment, he/she should be permitted to continue in his/her post or
alternative work unless such an arrangement would have an adverse
effect on Company services. In such circumstances, annual or unpaid
leave should be approved or, exceptionally, suspension arranged.</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in">5.If an
employee has been off work during the period of treatment, before
returning to duty, he/she will be seen by the Occupational Health
Service / Company Approved Doctor who will advise management
regarding capability for continuation in his/her own post and whether
any special supervision or other arrangements are required. 
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in">6. Every
effort should be made to comply with the advice provided by the
Occupational Health Service / Company Approved Doctor. If it is not
reasonably practicable to do so, and as a result, the employees not
able to resume duty, employment may be terminated on the grounds of
incapacity (ill health).</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in">7. If an
employee is again involved in disciplinary situations resulting from
alcohol or drug abuse related problems, a second referral to the
Occupational Health Service / Company Approved Doctor and suspension
of the disciplinary procedure may be appropriate. If they advise
positively on the possibilities of further treatment or help and the
willingness of the employee to co-operate, the disciplinary procedure
may be suspended again to permit treatment and help to be undertaken.
This second referral will not apply if the further disciplinary
problems involve serious misconduct. Third and subsequent referrals
are not permissible.</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><U><B>Situations
where a Disciplinary Situation does not exist</B></U></P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in">1. There
may be situations where the possible existence of alcohol or drug
abuse problems affecting an employee comes to a manager's attention,
although there is, or has been, no discernible effect on work
performance or behavior. This could arise if an employee confides in
his/her manager about an alcohol or drug abuse problem, or a manager
could see a need to approach a employee after observing possible
&quot;indicators&quot; of an alcohol or drug abuse problem (i.e.) an
absence pattern, information provided by the member of staff's
colleagues, etc.</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in">2. In
such situations, the Company would wish employee to feel they could
seek help from their employer (in complete confidence) without worry
that their job security would be in jeopardy. Accordingly if managers
should be faced with a situation of this type they should:</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.5in; margin-bottom: 0in">
a) Seek the advice of the Occupational Health Service / Company
Approved Doctor regarding whether and how the matter could be dealt
with;</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.5in; margin-bottom: 0in">
b) Counsel the employee and, if appropriate, arrange for the employee
to be interviewed by the Occupational Health Service / Company
Approved Doctor.</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.5in; margin-bottom: 0in">
c) As in the procedure described above, the Occupational Health
Service / Company Approved Doctor will play a facilitating role
(i.e.) seeking to establish whether a problem exists, advising and
directing the employee towards appropriate forms of treatment and
help.</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in">3. These
steps cannot be taken without the co-operation of the member of
staff. If the employee does not wish to co-operate, no further action
should be taken.</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in">4. Should
an employee take up the opportunity of assistance on this voluntary
basis there need be no further formal involvement of management in
terms of action or the right to learn of progress with treatment. It
may be however that the employee would wish, or agree to, further
involvement of management as a means of assisting progress with
treatment.</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in">5. Use of
the disciplinary procedures and/or the application of the approach
described above would only be appropriate if subsequently, the
employee is involved in a breach of disciplinary rules.</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in">6.Should
the problems of the employee develop to an extent that his/her
continuation in post or employment became impossible, it may be
necessary to identify alternative work or arrange for termination, on
the same basis as the Company operates for employee with problems of
incapacity due to ill health.</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><U><B>Drug
/Alcohol Testing</B></U></P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in">1.
Pacific Sea BPO Services Inc. will ensure that all its employees work
within the laws of the land. The Philippine laws on use of drugs and
alcohol are clear:</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.5in; margin-bottom: 0in">
&bull;It is a criminal offense for certain workers, such as drivers
or operators of public transport systems, to be unfit for their work
due to taking drugs or alcohol.  
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.5in; margin-bottom: 0in">
&bull;It is a criminal offense to be unfit to drive, attempt to drive
or be in charge of a motor vehicle when under the influence of drugs
or alcohol.  
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.5in; margin-bottom: 0in">
&bull;The possession, supply or production of controlled drugs is
unlawful except for in special circumstances (e.g. when they have
been prescribed by a doctor).</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.5in; margin-bottom: 0in">
&bull;Employees are also legally required to take reasonable care of
themselves and to behave in a way that does not pose risks to the
health and safety of themselves or others in the workplace.  This
includes consideration of the effects that intoxication through
taking alcohol or drugs may have.</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in">2. In
order to ensure compliance with the law, Pacific Sea BPO Services
Inc. will undertake drug / alcohol testing for certain key jobs
within the Company. These will be carried out pre-employment, as part
of a random testing scheme or as a result of an incident. These jobs
are to be determined by the management</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.5in; margin-bottom: 0in">
&bull;The Company reserves the right to add to or amend this list of
jobs as appropriate.</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.5in; margin-bottom: 0in">
&bull;Individuals in these posts will be asked to agree to testing as
part of their contract of employment.</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in">3. To
ensure the testing is legal and safe the following arrangements will
apply:</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.5in; margin-bottom: 0in">
&bull;Testing only to be carried out as a part of this policy, and
only by trained employee who will carry out the test in a
non-invasive way &ndash; usually by urine sample or exhalation;</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.5in; margin-bottom: 0in">
&bull;Samples to be collected under supervised conditions but
respecting human dignity. Two identical samples are taken either on
site or split in the test laboratory;</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.5in; margin-bottom: 0in">
&bull;Samples to be kept under &ldquo;Chain of Custody&rdquo; at all 
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.5in; margin-bottom: 0in">
&bull;Screening test for alcohol / common drugs to be carried out on
one sample with either positive or negative results;</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.5in; margin-bottom: 0in">
&bull;Any positive results from screening to be confirmed by approved
scientific techniques;</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.5in; margin-bottom: 0in">
&bull;Results to be reviewed by an expert and reported back;</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.5in; margin-bottom: 0in">
&bull;Second sample to be kept for further analysis as part of any
appeal by the employee;</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.5in; margin-bottom: 0in">
&bull;Confidentiality will be maintained at all times. 
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in">Pacific
Sea BPO Services Inc. believes that effective workplace drug and
alcohol policies are a better way of achieving results than
drug/alcohol testing and that providing an environment where
employees can discuss any drug/alcohol problems they have, with the
prospect of gaining help and support will be more effective than a
testing regime. Therefore the undertaking of drug / alcohol testing
in the workplace will be minimal and used only where the Company has
a reasonable belief that abuse is taking place.</P>
<P STYLE="margin-bottom: 0in"><FONT FACE="Times New Roman, serif"><FONT SIZE=3>Q:
Whom do I contact if I have any questions?</FONT></FONT></P>
<P STYLE="margin-bottom: 0in"><FONT FACE="Times New Roman, serif"><FONT SIZE=3>A:
HR- Employee Relation </FONT></FONT>
</P>
<P STYLE="text-indent: 0.5in; margin-bottom: 0in"><FONT FACE="Times New Roman, serif"><FONT SIZE=3>Q:
Whom do I escalate to?</FONT></FONT></P>
<P STYLE="margin-bottom: 0in"><FONT FACE="Times New Roman, serif"><FONT SIZE=3>A:
HR-Admin Manager</FONT></FONT></P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.25in; margin-bottom: 0in">
<BR>
</P>
<P CLASS="western" ALIGN=CENTER STYLE="margin-bottom: 0in"><B>LOCKER
AND PEDESTAL POLICY</B></P>
<CENTER>
	<TABLE WIDTH=430 BORDER=1 BORDERCOLOR="#00000a" CELLPADDING=7 CELLSPACING=0>
		<COL WIDTH=53>
		<COL WIDTH=204>
		<COL WIDTH=128>
		<TR VALIGN=TOP>
			<TD WIDTH=53 HEIGHT=8>
				<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in"><BR>
				</P>
			</TD>
			<TD WIDTH=204>
				<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in">
				<B>Release Date:</B></P>
				<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in">January
								</P>
			</TD>
			<TD WIDTH=128>
				<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in"><B>Review
				Date:</B></P>
			</TD>
		</TR>
		<TR VALIGN=TOP>
			<TD WIDTH=53 HEIGHT=8>
				<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in">
				<B>Version:</B></P>
				<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in"> <B>1.0</B></P>
			</TD>
			<TD WIDTH=204>
				<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in">
				<B>Process Owner:</B></P>
				<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in">Human
				Resource 
				</P>
			</TD>
			<TD WIDTH=128>
				<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in">
				<B>Process Administrator:</B></P>
				<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in">Supervisors/HOD/HR</P>
			</TD>
		</TR>
	</TABLE>
</CENTER>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0.02in; line-height: 100%">
<U><B>Introduction</B></U></P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0.02in; line-height: 100%">
All lockers and pedestals made available for employee use on the
Company premises are the property of the Company.&nbsp; These lockers
and pedestals are made available for employee use to store Company
supplies and personal items necessary for use at Company.&nbsp; These
lockers and pedestals are not to be used to store items which cause,
or can reasonably be foreseen to cause, an interference with Company
purposes or which are forbidden by law or Company rules.</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0.02in; line-height: 100%">
The employee's use of the locker or pedestal does not diminish the
Company&rsquo;s ownership or control over those items. The Company
retains the right to inspect the locker or pedestal and its contents
to insure that the locker or pedestal is being used in accordance
with their intended purpose, and to eliminate fire or other hazards,
maintain sanitary conditions, attempt to locate lost or stolen
material and to prevent use of the locker or pedestal to store
prohibited or dangerous materials such as weapons, illegal drugs,
alcohol, or tobacco.</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0.02in; line-height: 100%">
<U><B>Definition</B></U></P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0.02in; line-height: 100%">
Locker space with built-in lock is provided to each employee on a
voluntary basis within the following guidelines:</P>
<OL>
	<LI><P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0.02in; line-height: 100%">
	Employees completely filled up the application for locker space
	issued by the Company.</P>
	<LI><P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0.02in; line-height: 100%">
	Only Company issued keys will be permitted.</P>
	<LI><P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0.02in; line-height: 100%">
	The Company assumes <B>NO</B> responsibility for loss or damage to
	any item in a locker, locked or unlocked.</P>
	<LI><P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0.02in; line-height: 100%">
	Drinks and food items are not to be kept in lockers at any time. 
	</P>
</OL>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0.02in; line-height: 100%">
Each employee will be assigned a locker at the beginning of
employment.&nbsp; <B>Employees should keep their lockers locked at
all times.</B>&nbsp; Employees should not share lockers or us other
employees' lockers - unless assignment is made by the office.&nbsp;
Employees should not write in or on lockers.&nbsp; Decals and similar
materials are not to be placed inside or outside.&nbsp; Employees are
encouraged to keep their lockers cleaned out.&nbsp; 
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0.02in; line-height: 100%">
<U><B>Locker Rules</B></U></P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0.02in; line-height: 100%">
In order to implement the Company policy concerning employee lockers,
the Company adopts the following rules and regulations:</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
&nbsp;&nbsp;&nbsp; <B>1.&nbsp;&nbsp;&nbsp; Locks:</B></P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0.02in; line-height: 100%">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
The Company will retain access to employee lockers by keeping a
master key.&nbsp; Employees may not use their own locks to prevent
access to lockers by Company officials.&nbsp; Any unauthorized locks
may be removed without notice and destroyed.</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
&nbsp;&nbsp; &nbsp;<B>2.&nbsp;&nbsp;&nbsp; Inspection of All Lockers:</B></P>
<OL TYPE=A>
	<LI><P ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0.02in; line-height: 100%">
	An inspection of all lockers and pedestals in the Company, or all
	lockers and pedestals in a particular area of the Company, and may
	be conducted if the immediate superior or manager reasonably
	believes that such an inspection is necessary to prevent, impede or
	substantially reduce the risk of (1) an interference with Company
	purposes or function (2) a physical injury or illness to any person,
	(3) damage to personal or Company property, or (4) a violation of
	law or Company rules.&nbsp; Examples of circumstances justifying a
	general inspection of a number of lockers or pedestals include the
	following:</P>
</OL>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.67in; margin-top: 0.02in; margin-bottom: 0.02in; line-height: 100%">
 (1)&nbsp;&nbsp;&nbsp; When the Company receives a bomb threat;</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.67in; margin-top: 0.02in; margin-bottom: 0.02in; line-height: 100%">
(2)&nbsp;&nbsp;&nbsp;When evidence of drug or alcohol use creates a
reasonable belief of an unusually high level of employee use;</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.5in; margin-top: 0.02in; margin-bottom: 0.02in; line-height: 100%">
     (3)&nbsp;&nbsp;&nbsp;When a missing item or property is lost.</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.67in; margin-top: 0.02in; margin-bottom: 0.02in; line-height: 100%">
 (4)&nbsp; Where employee violence or threats of violence create a
reasonable belief that  weapons     are stored in the lockers.</P>
<OL TYPE=A START=2>
	<LI><P ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0.02in; line-height: 100%">
	If a general inspection of a number of lockers is necessary, then
	all lockers in the defined inspection area will be examined.&nbsp;
	Employees will not necessarily be given the opportunity to be
	present while a general inspection is being conducted.</P>
</OL>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0.02in; line-height: 100%">
&nbsp;&nbsp;&nbsp; <B>3.&nbsp;&nbsp;&nbsp; Involvement of Law
Enforcement Officials:</B></P>
<OL TYPE=A>
	<LI><P ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0.02in; line-height: 100%">
	The management or HR may request the assistance of law enforcement
	officials to assist the Company officer in inspecting lockers or
	pedestals or their contents for purposes of enforcing Company
	policies only if such assistance is required</P>
</OL>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.33in; margin-top: 0.02in; margin-bottom: 0.02in; line-height: 100%">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
(1)&nbsp;&nbsp;&nbsp; To identify substances which may be found in
the lockers</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.33in; margin-top: 0.02in; margin-bottom: 0.02in; line-height: 100%">
           (2)&nbsp;&nbsp;&nbsp; To protect the health and safety of
persons or property, such as to aid in the discovery and disarming of
bombs, which may be located in the lockers.</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0.02in; line-height: 100%">
&nbsp;&nbsp;&nbsp; <B>4.&nbsp;&nbsp;&nbsp; Locker Maintenance:</B></P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.5in; margin-top: 0.02in; margin-bottom: 0.02in; line-height: 100%">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
Nothing in these rules shall affect member of the utilities who, at
the direction of the management, clean out (a) lockers from time to
time in accordance with general housekeeping schedule or (b) the
locker of the employee no longer enrolled in the Company.&nbsp;
Further, the utility staff may open an employee's locker upon
authorization of the management during any vacation period if they
have reason to believe such locker contains rotting, spoiling, or
mildewing items such as food, wet clothes, etc.</P>
<OL START=5>
	<LI><P ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0.02in; line-height: 100%">
	<B>Lost Key/s:</B></P>
</OL>
<P ALIGN=JUSTIFY STYLE="margin-left: 0.5in; margin-top: 0.02in; margin-bottom: 0.02in; line-height: 100%">
<BR><BR>
</P>
<P ALIGN=JUSTIFY STYLE="margin-left: 0.5in; margin-top: 0.02in; margin-bottom: 0.02in; line-height: 100%">
In case the employee lost his/her key, he shall report the incident
immediately to the Admin Officer in charge of the lockers and
pedestals. The Company may require the employee to submit an
Affidavit of Loss and pay for the lost key/s before a new one shall
be issued.</P>
<P ALIGN=JUSTIFY STYLE="margin-left: 0.5in; margin-top: 0.02in; margin-bottom: 0.02in; line-height: 100%">
 
</P>
<OL START=6>
	<LI><P ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0.02in; line-height: 100%">
	<B>Separation from Employment:</B></P>
</OL>
<P ALIGN=JUSTIFY STYLE="margin-left: 0.5in; margin-top: 0.02in; margin-bottom: 0.02in; line-height: 100%">
<BR><BR>
</P>
<P ALIGN=JUSTIFY STYLE="margin-left: 0.5in; margin-top: 0.02in; margin-bottom: 0.02in; line-height: 100%">
The employee is required to surrender the keys for the locker and
pedestal upon separation. The employee failure to do so will make the
employee ineligible for clearance. The Company reserves the right to
ask for indemnity in case the employee failed to return the key/s.</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in">Q:
Whom do I contact if I have any questions?</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.25in; margin-bottom: 0in">
A: Administration Assistant</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in">Q: Whom
do I escalate to?</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.25in; margin-bottom: 0in">
A: HR-Admin Manager</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.25in; margin-bottom: 0in">
<BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.25in; margin-bottom: 0in">
<BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.25in; margin-bottom: 0in">
<BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.25in; margin-bottom: 0in">
<BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.25in; margin-bottom: 0in">
<BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.25in; margin-bottom: 0in">
<BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.25in; margin-bottom: 0in">
<BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><BR>
</P>
<P ALIGN=CENTER STYLE="margin-bottom: 0in"><FONT FACE="Times New Roman, serif"><FONT SIZE=3><B>BULLETIN
BOARD POLICY</B></FONT></FONT></P>
<P ALIGN=CENTER STYLE="margin-bottom: 0in"><BR>
</P>
<CENTER>
	<TABLE WIDTH=430 BORDER=1 BORDERCOLOR="#00000a" CELLPADDING=7 CELLSPACING=0>
		<COL WIDTH=53>
		<COL WIDTH=204>
		<COL WIDTH=128>
		<TR VALIGN=TOP>
			<TD WIDTH=53 HEIGHT=8>
				<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in"><BR>
				</P>
			</TD>
			<TD WIDTH=204>
				<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in">
				<B>Release Date:</B></P>
				<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in">February</P>
			</TD>
			<TD WIDTH=128>
				<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in"><B>Review
				Date:</B></P>
			</TD>
		</TR>
		<TR VALIGN=TOP>
			<TD WIDTH=53 HEIGHT=8>
				<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in">
				<B>Version:</B></P>
				<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in"> <B>1.0</B></P>
			</TD>
			<TD WIDTH=204>
				<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in">
				<B>Process Owner:</B></P>
				<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in">Human
				Resource 
				</P>
			</TD>
			<TD WIDTH=128>
				<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in">
				<B>Process Administrator:</B></P>
				<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in">Supervisors/HOD/HR</P>
			</TD>
		</TR>
	</TABLE>
</CENTER>
<P CLASS="western" STYLE="margin-bottom: 0in"><BR>
</P>
<P CLASS="western" STYLE="margin-bottom: 0in"><U><B>Objective</B></U></P>
<P CLASS="western" STYLE="margin-bottom: 0in">Pacific Sea BPO
Services Inc.  uses physical bulletin boards to transmit information
to employees. Bulletin board postings facilitate communication and
employee activities. While the company also uses other communication
methods (i.e., electronic bulletin board, email, etc.), physical
bulletin boards are useful in providing information to employees at a
specific physical location.</P>
<P CLASS="western" STYLE="margin-bottom: 0in"><U><B>Policy</B></U></P>
<P CLASS="western" STYLE="margin-bottom: 0in">Pacific Sea BPO
Services Inc.  maintains two types of bulletin boards, physical
bulletin board maintain in the workplace and BULLETIN BOARD in P
Drive.  All notices posted on bulletin boards must be directed to
Human Resources prior to posting.</P>
<P CLASS="western" STYLE="margin-bottom: 0in">Bulletin boards are
located in areas of general employee access and will adhere to the
following:</P>
<P CLASS="western" STYLE="margin-left: 0.64in; margin-bottom: 0in">*
Since several bulletin boards are required in the same area, they
will be uniform in size, material, and appearance. 
</P>
<P CLASS="western" STYLE="margin-left: 0.64in; margin-bottom: 0in">*
All boards will have a backing material that can be used for
thumbtacks. Staples are not to be used on bulletin boards.</P>
<P CLASS="western" STYLE="margin-left: 0.5in; margin-bottom: 0in">   
* Bulletin postings will be available in languages other than
English, as needed.</P>
<P CLASS="western" STYLE="margin-bottom: 0in"><B>Procedure:</B></P>
<OL>
	<LI><P STYLE="margin-bottom: 0in">The Administration department is
	responsible for all workplace postings. Generally, posters required
	by law will be displayed on the physical and the intranet bulletin
	boards. The list of required postings will be reviewed at the
	beginning of each calendar quarter . Admin staff must take care to
	remove out of date postings immediately.</P>
	<LI><P STYLE="margin-bottom: 0in">All postings are to be approved by
	the Administration Department, which is responsible for monitoring,
	updating, and removing posted items. Employees who wish to post
	information on the bulletin boards should provide general
	information and be inclusive of all employees.</P>
	<LI><P STYLE="margin-bottom: 0in">Notices posted or left on tables
	without authorization will be removed and recycled.</P>
	<LI><P STYLE="margin-bottom: 0in">Due to limited display space, the
	Company reserves the right to restrict the size, number, and
	location of display materials. Some approved items may not be posted
	due to space restrictions. Priority in posting will be given to
	Company announcements.</P>
	<LI><P STYLE="margin-bottom: 0in">Postings will only remain on the
	physical bulletin board for twenty-one (21) days, and then removed.
	Once items are removed, they are recycled. Employees can still view
	the posting in the bulletin board located at their P Drive.</P>
	<LI><P STYLE="margin-bottom: 0in">Employees should make an effort to
	check the physical bulletin board at the beginning of each shift.</P>
	<LI><P STYLE="margin-bottom: 0in">Employees who wished to post any
	notice shall seek Admin Department approval.  Two copies should be
	given. One (1) will be for documentation purposes and the other for
	posting. A soft copy should also be sent to Admin Department for
	posting in the P Drive bulletin board.</P>
</OL>
<P CLASS="western" STYLE="margin-left: 0.25in; margin-bottom: 0in"><B>Posting
Guide:</B></P>
<OL>
	<LI><P STYLE="margin-top: 0.02in; margin-bottom: 0.02in; line-height: 100%">
	Only one copy of a notice is permitted.</P>
	<LI><P STYLE="margin-top: 0.02in; margin-bottom: 0.02in; line-height: 100%">
	Maximum size is 11&rdquo; x 14&quot;.</P>
	<LI><P STYLE="margin-top: 0.02in; margin-bottom: 0.02in; line-height: 100%">
	Materials must clearly show date of posting.</P>
	<LI><P STYLE="margin-top: 0.02in; margin-bottom: 0.02in; line-height: 100%">
	Notices of events should be removed after the event has taken place.</P>
	<LI><P STYLE="margin-top: 0.02in; margin-bottom: 0.02in; line-height: 100%">
	Notices must be placed properly so they do not obscure other
	notices.</P>
</OL>
<P CLASS="western" STYLE="margin-bottom: 0in"><BR>
</P>
<P CLASS="western" ALIGN=CENTER STYLE="margin-left: 0.25in; margin-bottom: 0in">
<BR>
</P>
<P CLASS="western" ALIGN=CENTER STYLE="margin-left: 0.25in; margin-bottom: 0in">
<BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><BR>
</P>
<P CLASS="western" ALIGN=CENTER STYLE="margin-left: 0.25in; margin-bottom: 0in">
<B>COMPANY ACCOMMODATION POLICY</B></P>
<CENTER>
	<TABLE WIDTH=430 BORDER=1 BORDERCOLOR="#00000a" CELLPADDING=7 CELLSPACING=0>
		<COL WIDTH=53>
		<COL WIDTH=204>
		<COL WIDTH=128>
		<TR VALIGN=TOP>
			<TD WIDTH=53 HEIGHT=8>
				<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in"><BR>
				</P>
			</TD>
			<TD WIDTH=204>
				<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in">
				Release Date:</P>
				<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in">February
				2012</P>
			</TD>
			<TD WIDTH=128>
				<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in">
				Review Date:</P>
				<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in">June
				2013</P>
			</TD>
		</TR>
		<TR VALIGN=TOP>
			<TD WIDTH=53 HEIGHT=8>
				<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in">
				Version:</P>
				<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in">1.0</P>
			</TD>
			<TD WIDTH=204>
				<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in">
				Process Owner:</P>
				<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in">Human
				Resource 
				</P>
			</TD>
			<TD WIDTH=128>
				<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in">
				Process Administrator:</P>
				<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in">Supervisors/HOD/HR</P>
			</TD>
		</TR>
	</TABLE>
</CENTER>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><U><B>Objective:</B></U></P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in">To
promote fair and equitable use of the house/ condominium unit
operated by Pacific Sea BPO Services Inc. and provide necessary
guidelines for tenants in order to make everyone&rsquo;s stay safer
and more enjoyable.</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><U><B>Scope</B></U></P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in">All expat
employees</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><U><B>Applicability</B></U></P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in">All
policies applicable shall extend to accommodation provided by the
Company. All acts which may directly or indirectly affect the company
shall be dealt with accordingly. 
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><U><B>Rules</B></U></P>
<P ALIGN=JUSTIFY STYLE="margin-left: 0.5in; margin-bottom: 0in"><BR>
</P>
<OL>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in">Pets are not allowed
	in the apartments.</P>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in">No Expatriate staff
	may assign/change his/her allotted room in an apartment to another
	Expat staff unless with prior written consent of the Admin
	Department Housing Section. 
	</P>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in">Families and
	relatives, especially spouse is NOT allowed to stay in the assigned
	condo unit with due respect to your roommate as it may not be
	comfortable for both parties&rsquo; privacy.</P>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in"> Guests should be
	entertained at lobby within reasonable hours of the day only. All
	guests should leave the lobby before 11 p.m. The Expat shall be
	responsible for the conduct and action of his/her guests while
	inside the apartment. 
	</P>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in">If a transfer of
	room is to be requested, a 2- week notice should be given to HR &amp;
	ADM Department for Unit transfer indicating reason why transfer is
	being indicated. The transfer approval is subject to management
	discretion and availability of units.</P>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in">All Expatriate staff
	shall maintain in reasonable health, cleanliness and sanitary
	standards throughout the premises of his/her assigned apartment. 
	</P>
</OL>
<P ALIGN=JUSTIFY STYLE="margin-left: 0.5in; margin-bottom: 0in"><BR>
</P>
<OL START=7>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in">Smoking is strictly
	prohibited in the common areas of the building and inside your
	assigned apartment.</P>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in">No unlawful or
	immoral practice or activities shall be allowed inside the assigned
	units. Sale of beer, cigarettes, liquor or intoxicating beverages as
	well as the sale and use of prohibited drugs within the premise are
	strictly prohibited. 
	</P>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in">Expat staff is
	advised to observe proper conduct; proper attire and decorum at all
	time in the unit as well as abide by the building internal rules and
	regulations. 
	</P>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in">Expat staff is
	advised to maintain peace, quiet and to refrain from making any
	noise, boisterous or loud acts that would disturb the neighbors or
	occupants. 
	</P>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in">All Expatriate staff
	must take the necessary care and precaution to avoid damages or
	destruction to his/her assigned apartment. Extra-ordinary damage to
	the apartment unit due to the fault and negligence of the expat
	staff shall be charged to him/her accordingly by the company. 
	</P>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in">All Expatriate staff
	shall pay the expenses for the cleaning/ laundry of the curtains and
	their own comforter. 
	</P>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in">The company shall
	provide payments for the following services such as: water,
	electricity, association dues, basic monthly telephone charges and
	cable television&rsquo;s but limited to the entitlement and utility
	expenses as capped by the company.  Excessive and unreasonable usage
	of electricity and consumption of water will be chargeback to the
	occupants of the apartment. 
	</P>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in">Company will provide
	cable television channel. The service provider shall be determined
	by the company depending on its availability at the leases premises.
	Additional Cable television network or channel not included in the
	company standard package shall be borne by the employee.</P>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in">IDD and NDD are not
	included on the telephone call entitlement.</P>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in">The internet line
	facilities shall not be more than 1 mbps.</P>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in">Monthly cleaning
	allowance will be prepared by the 28<SUP>th</SUP> of each month and
	will be released every 5<SUP>th</SUP> day. House leaders should be
	the one who will claim the cleaning allowance. 
	</P>
</OL>
<P ALIGN=JUSTIFY STYLE="margin-left: 0.5in; margin-bottom: 0in">Monthly
Cleaning Subsidy Allowance will only be distributed to the House
leaders, not the staff.  
</P>
<P ALIGN=JUSTIFY STYLE="margin-left: 0.5in; margin-bottom: 0in">Should
there be any staff on job attachment in overseas for the period over
2 weeks, this allowance will be paid in half amount (PHP 175). 
</P>
<P ALIGN=JUSTIFY STYLE="margin-left: 0.5in; margin-bottom: 0in"><BR>
</P>
<P ALIGN=JUSTIFY STYLE="margin-left: 0.5in; margin-bottom: 0in">Should
there be any company visitors assigned to stay in company condo for a
short period i.e. less than 1 month of each stay; this allowance
shall be raised based on their actual number of days stayed.</P>
<P ALIGN=JUSTIFY STYLE="margin-left: 0.5in; margin-bottom: 0in">The
Cleaning Subsidy Allowance for company visitors shall be prepared on
a monthly basis. If there is any staff/ visitors coming over during
the month, the amount of additional allowance shall be raised in the
month. Also, the amount will be passed to the respective House
Leader, not the visitors, on the following month payout.  
</P>
<P ALIGN=JUSTIFY STYLE="margin-left: 0.5in; margin-bottom: 0in"><BR>
</P>
<OL START=18>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in">A maximum utility
	expense for each Company lease apartment shall be determined by the
	management per occupant per month. Any amount exceeding this limit
	shall be deducted equally from the monthly subsidy allowances of all
	the employees staying in the unit. Thus it is important to turn off
	the water faucet properly as not to waste water and switch off the
	lights and air conditioning units when out of the condo to conserve
	electricity. 
	</P>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in">For everyone&rsquo;s
	protection and to avoid discrepancies, there shall be a monthly
	liquidation for the monthly cleaning allowance. All the receipt
	shall be given and kept by the assigned housemaid. Logbook shall be
	imposed and the money handed over to housemaid shall be logged.</P>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in">There shall be
	surprise spot checks in all the condo units regularly. If happens
	that a unit, especially the kitchen  is very untidy , certain
	penalties to be imposed as below:</P>
	<OL>
		<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in">Kitchen Area</P>
	</OL>
</OL>
<UL>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in">First Offense &ndash;
	all kitchen utensils will be confiscated for 1 week</P>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in">Second Offense - all
	kitchen utensils will be confiscated for 2 weeks</P>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in">Third/ Final Offense
	- all kitchen utensils will be confiscated and will not be returned.</P>
</UL>
<OL>
	<OL>
		<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in">Living Room Area</P>
	</OL>
</OL>
<UL>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in">For example, too
	many shoes/slippers that need shoe racks, the Housing-Admin in
	charge will use your Monthly Cleaning Allowance for the coming month
	to purchase of the racks needed. 
	</P>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in">Underwear and any
	sensitive clothing shall not be put in the living area for proper
	hygiene controls.</P>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in">Ironed clothes shall
	be kept within two days or else it will be confiscated and will
	never be returned. 
	</P>
</UL>
<P ALIGN=JUSTIFY STYLE="margin-left: 1.5in; margin-bottom: 0in"><BR>
</P>
<OL START=21>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in">All units shall be
	assigned part-time housemaids.</P>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in">The maid is required
	to do general cleaning of the condo unit wash and iron clothes and
	to buy monthly cleaning utensils.  Any other personal request to buy
	food and run errand for the staff is not allowed EXCEPT above
	Manager level.</P>
</OL>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in">Should
there be any housing related problems the appointed house leader will
inform the Housing-Admin in charge and not to the assigned housemaid
in your apartment.</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in">Q:
Whom do I contact if I have any questions?</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.25in; text-indent: 0.25in; margin-bottom: 0in">
A: Administration Assistant</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="text-indent: 0.25in; margin-bottom: 0in">
Q: Whom do I escalate to?</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.25in; margin-bottom: 0in">
A: HR-Admin Manager</P>
<P CLASS="western" ALIGN=CENTER STYLE="margin-bottom: 0in; line-height: 100%">
<FONT COLOR="#000000"><B>PSP CONFIDENTIAL INFORMATION POLICY</B></FONT></P>
<P CLASS="western" ALIGN=CENTER STYLE="margin-bottom: 0in; line-height: 100%">
<BR>
</P>
<CENTER>
	<TABLE WIDTH=430 BORDER=1 BORDERCOLOR="#00000a" CELLPADDING=7 CELLSPACING=0>
		<COL WIDTH=53>
		<COL WIDTH=204>
		<COL WIDTH=128>
		<TR VALIGN=TOP>
			<TD WIDTH=53 HEIGHT=8>
				<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in"><BR>
				</P>
			</TD>
			<TD WIDTH=204>
				<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in">
				Release Date:</P>
				<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in">February
				2012</P>
			</TD>
			<TD WIDTH=128>
				<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in">
				Review Date:</P>
				<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in">June
				2013</P>
			</TD>
		</TR>
		<TR VALIGN=TOP>
			<TD WIDTH=53 HEIGHT=8>
				<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in">
				Version:</P>
				<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in">1.0</P>
			</TD>
			<TD WIDTH=204>
				<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in">
				Process Owner:</P>
				<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in">Human
				Resource 
				</P>
			</TD>
			<TD WIDTH=128>
				<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in">
				Process Administrator:</P>
				<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in">Supervisors/HOD/HR</P>
			</TD>
		</TR>
	</TABLE>
</CENTER>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
<BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
<BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
<FONT COLOR="#000000"><U><B>Policy:</B></U></FONT></P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
<BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
<FONT COLOR="#000000">All PSP employees and those acting on behalf of
the PSP who have access to confidential PSP information will ensure
that all information are and will remain confidential even after
their employment.</FONT></P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
<BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
<FONT COLOR="#000000">In addition, all PSP employees and those acting
on behalf of the PSP are responsible for immediately reporting any
suspected violation(s) of this policy or any other action which
violates confidentiality of PSP information to the
manager/supervisor, department head, or PSP operations
manager/designee, or HR manager.</FONT></P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
<BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
<FONT COLOR="#000000"><U><B>Definitions:</B></U></FONT></P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
<BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
<FONT COLOR="#000000">For purposes of this policy, the following are
definitions that will assist employees and those acting on behalf of
the PSP in understanding and ensuring compliance with the policy:</FONT></P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
<BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
<FONT COLOR="#000000"><I>&quot;Information&quot;</I></FONT><FONT COLOR="#000000">
is defined as any communication or reception of knowledge regarding
the PSP and includes facts, data, or opinions that may consist of
numerical, graphic, or narrative forms, whether oral, downloaded to
equipment, or maintained in mediums, including, but not limited to,
computerized databases, papers, microfilms, magnetic tapes, disks,
CDs, flash drives, and cellphones.</FONT></P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
<BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
<FONT COLOR="#000000"><I>&quot;Confidential Information&quot;</I></FONT><FONT COLOR="#000000">
is defined as any PSP &quot;Information&quot; as described above that
specifically identifies and/or describes an employee, an employee's
protected health information, and/or PSP organizational information,
which if disclosed or released, a reasonable person would conclude
that negative financial, competitive, or productive loss may occur
and/or may cause legal or other non-beneficial impacts on the PSP.</FONT></P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
<BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
<FONT FACE="Arial, serif"><FONT SIZE=2>Confidential information does
not include grant and contract proposal information released to
sponsors and project partners as part of a formal submission, and
subsequent award information and correspondence received from or sent
to those parties.</FONT></FONT></P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
<BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
<FONT COLOR="#000000">Additional specific examples of &quot;confidential
information&quot; include, but are not limited to, the following
items. Individuals who are uncertain if the type of information being
used is confidential should seek clarification from their
manager/supervisor.</FONT></P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
<BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
<BR>
</P>
<UL>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%"><FONT COLOR="#000000">An
	employee's name, birth date, race, gender, marital status,
	disability status, veteran status, citizenship, Social Security.</FONT></P>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%"><FONT COLOR="#000000">An
	employee's home address, home telephone number(s), relatives names,
	addresses, and telephone numbers.</FONT></P>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%"><FONT COLOR="#000000">An
	employee's Personnel File</FONT></P>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%"><FONT COLOR="#000000">An
	employee's employment status, including leave of absence
	information, appointment begin and end dates, termination date,
	termination reason.</FONT></P>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%"><FONT COLOR="#000000">
	</FONT><FONT COLOR="#000000">An employee's payroll information,
	including salary rates, tax information, withholdings, direct
	deposit information.</FONT></P>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%"><FONT COLOR="#000000">An
	employee's benefit enrollment information</FONT></P>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%"><FONT COLOR="#000000">An
	employee's Protected Health Information </FONT>
	</P>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%"><FONT COLOR="#000000">Organizational
	finance information, including rates and investments</FONT></P>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%"><FONT COLOR="#000000">Organizational
	operating plans, including strategic, business, and marketing plans</FONT></P>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%"><FONT COLOR="#000000">Facilities
	management documentation, including security system information</FONT></P>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%"><FONT COLOR="#000000">Auditing
	information, including internal audit reports and investigative
	records</FONT></P>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%"><FONT COLOR="#000000">All
	organizational legal documents, including pending lawsuits and
	attorney-client communications</FONT></P>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">All
	information, materials, data and records designated confidential by
	the Company, by law or by contract, including information obtained
	by the Company from third parties under non-disclosure agreements or
	any other contract that designates third party information as
	confidential</P>
</UL>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
<BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
<U><B>Requirements for Maintaining Confidential Information</B></U></P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
<BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
All PSP employees and those acting on behalf of the PSP with
authorized access to confidential information stored on the PSP
network or in any media format are required to protect this
information. All PSP employees and those acting on behalf of PSP:</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
<BR>
</P>
<OL>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%"><FONT COLOR="#000000">Will
	access confidential information for the sole purpose of performing
	their job-related duties.</FONT></P>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%"><FONT COLOR="#000000">Will
	not seek personal benefit or permit others to benefit personally
	from any confidential information that comes to them through their
	work assignments.</FONT></P>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%"><FONT COLOR="#000000">Will
	not permit unauthorized use of any confidential information that can
	be found on the PSP network or in any media format.</FONT></P>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%"><FONT COLOR="#000000">Will
	not enter, add, change, or delete confidential information to the
	PSP network or any media format outside of the scope of their job.</FONT></P>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%"><FONT COLOR="#000000">Will
	not release or disclose PSP confidential information other than what
	is required to perform their job related duties and in accordance
	with applicable PSP policies and procedures on releasing or
	disclosing confidential information. </FONT>
	</P>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%"><FONT COLOR="#000000">Will
	not exhibit the contents of any confidential information on the PSP
	network or in any media format to any person unless it is necessary
	to perform </FONT>their job-related duties and in accordance with
	all applicable PSP policies and procedures on exhibiting
	confidential information.</P>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">Will
	keep personal passwords confidential and will not disclose them to
	anyone within or outside the organization. Passwords should be kept
	in secure places. Forgotten passwords and suspected compromises of
	passwords should be reported to the individual responsible for PSP
	security or customer services and to the appropriate supervisor so
	the required action can be taken.</P>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">Will
	strive to keep confidential information on desktops or on computer
	screens from being viewed by others and will strive to ensure that
	computer screens are locked when away from their desk or office.</P>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">Will
	strive, for training purposes, to use simulated training information
	when possible; when this is not possible, will strive to protect
	and/or disguise any confidential information used for training
	purposes, including but not limited to, business system screen
	captures and business system instances.</P>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">Will
	strive to keep confidential information that is in any media format
	saved to their personal LAN drive and will strive to keep this
	information stored in a locked cabinet. Confidential information
	that requires viewing by more than one individual will either be
	stored on a restricted public drive or use a password protection
	feature.</P>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">Will
	strive to dispose of confidential information in accordance with
	applicable laws and/or PSP policies on record retention.</P>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">Will
	not discard any confidential information in a waste receptacle or
	recycling bin; will shred hard copy confidential information prior
	to disposal.</P>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">Will
	not remove confidential information from work premises without
	written authorization from the operations manager or designee.</P>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">Will
	not disclose confidential information to consultants without
	receiving prior approval from the operations manager or designee. 
	</P>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">In
	addition, consultants will not be allowed to remove confidential
	information from the premises without prior written approval from
	the operations manager or designee. Written approval indicates that
	a copy of the information can be removed from the premises but must
	be returned by a specified date.</P>
</OL>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
<BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
<FONT COLOR="#000000"><U><B>Reporting a Suspected Violation(s)</B></U></FONT></P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
<BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
<FONT COLOR="#000000">PSP employees and those acting on behalf of the
PSP must report a suspected violation(s) of this policy to the
appropriate person.</FONT></P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
<FONT COLOR="#000000"> </FONT>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
<FONT COLOR="#000000">If the suspected violation involves an
&quot;electronic&quot; breach of information, the supervisor,
operations head or department head must be notified immediately.</FONT></P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
<BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
<FONT COLOR="#000000">All reports will be held in strict confidence
and promptly investigated by the appropriate person.</FONT></P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
<BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
<U><B>Disciplinary Action</B></U></P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
<BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
For PSP  employee, disciplinary action, from Suspension up to and
including termination, may occur if it is determined that a
violation(s) of this policy has occurred.</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
<BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
The PSP will not tolerate retaliation toward or harassment of
employees who in good faith report a suspected or violation(s) of
this policy. The identity of individuals providing information about
a suspected violation(s) will be protected within legal limits.
Individuals who take retaliatory action will be</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
subject to disciplinary action, from suspension up to and including
termination.</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
<BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
The Company reserves the right to institute civil and criminal
proceedings against an employee who violates this policy.</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
<U><B>Responsibilities</B></U></P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
<BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
<FONT FACE="Arial, serif"><FONT SIZE=2>The following table identifies
individuals and their responsibilities with regard to this policy.</FONT></FONT></P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
<BR>
</P>
<TABLE WIDTH=638 BORDER=1 BORDERCOLOR="#00000a" CELLPADDING=7 CELLSPACING=0>
	<COL WIDTH=304>
	<COL WIDTH=304>
	<TR VALIGN=TOP>
		<TD WIDTH=304 HEIGHT=8>
			<P CLASS="western" ALIGN=JUSTIFY><FONT COLOR="#000000">Individual</FONT></P>
		</TD>
		<TD WIDTH=304>
			<P CLASS="western" ALIGN=JUSTIFY><FONT COLOR="#000000">Responsibilities</FONT></P>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD WIDTH=304 HEIGHT=9>
			<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><FONT COLOR="#000000">All
			PSP employees and those acting on behalf</FONT></P>
			<P CLASS="western" ALIGN=JUSTIFY><FONT COLOR="#000000">of the PSP</FONT></P>
		</TD>
		<TD WIDTH=304>
			<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><FONT COLOR="#000000">Abide
			by this policy for maintaining confidential</FONT></P>
			<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><FONT COLOR="#000000">information.</FONT></P>
			<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><BR>
			</P>
			<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><FONT COLOR="#000000">Report
			a suspected violation(s) of this policy to the</FONT></P>
			<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><FONT COLOR="#000000">appropriate
			person.</FONT></P>
			<P CLASS="western" ALIGN=JUSTIFY><FONT COLOR="#000000">(manager/supervisor,
			operations manager)</FONT></P>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD WIDTH=304 HEIGHT=9>
			<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><FONT COLOR="#000000">Supervisor/manager,
			department vice</FONT></P>
			<P CLASS="western" ALIGN=JUSTIFY><FONT COLOR="#000000">president/head</FONT></P>
		</TD>
		<TD WIDTH=304>
			<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><FONT COLOR="#000000">Abide
			by this policy for maintaining confidential</FONT></P>
			<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><FONT COLOR="#000000">information.</FONT></P>
			<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><BR>
			</P>
			<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><FONT COLOR="#000000">Encourage
			all PS employees and those acting on behalf of the PSP to abide by
			this policy.</FONT></P>
			<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><BR>
			</P>
			<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><FONT COLOR="#000000">Report
			a suspected violation(s) of this policy to the appropriate person.</FONT></P>
			<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><BR>
			</P>
			<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><FONT COLOR="#000000">To
			protect both the alleged violator and the individual reporting a
			potential violation.</FONT></P>
			<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><BR>
			</P>
			<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><FONT COLOR="#000000">Do
			not retaliate against the alleged violator or the</FONT></P>
			<P CLASS="western" ALIGN=JUSTIFY><FONT COLOR="#000000">individual
			reporting a potential violation(s).</FONT></P>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD WIDTH=304 HEIGHT=9>
			<P CLASS="western" ALIGN=JUSTIFY><FONT COLOR="#000000">Operations
			Manager/Department Heaed</FONT></P>
		</TD>
		<TD WIDTH=304>
			<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><FONT COLOR="#000000">Abide
			by this policy for maintaining confidential</FONT></P>
			<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><FONT COLOR="#000000">information.</FONT></P>
			<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><BR>
			</P>
			<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><FONT COLOR="#000000">Encourage
			all PSP employees and those acting on behalf of the PSP to abide
			by this policy.</FONT></P>
			<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><BR>
			</P>
			<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><FONT COLOR="#000000">Authorize
			the removal of confidential information from thework premises in
			accordance with this policy.</FONT></P>
			<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><BR>
			</P>
			<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><FONT COLOR="#000000">Report
			a suspected violation(s) of this policy to the  Human Resources
			office to protect both the alleged violator and the individual
			</FONT><FONT FACE="Arial, serif"><FONT SIZE=2>reporting the
			violation(s). </FONT></FONT>
			</P>
			<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><BR>
			</P>
			<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><FONT FACE="Arial, serif"><FONT SIZE=2>Investigate
			a reported suspected violation(s) and</FONT></FONT></P>
			<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><FONT FACE="Arial, serif"><FONT SIZE=2>determine
			if a violation(s) did or did not occur.</FONT></FONT></P>
			<P CLASS="western" ALIGN=JUSTIFY><BR>
			</P>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD WIDTH=304 HEIGHT=8>
			<P CLASS="western"><FONT COLOR="#000000">Human Resources</FONT></P>
		</TD>
		<TD WIDTH=304>
			<P CLASS="western" ALIGN=JUSTIFY><FONT COLOR="#000000">Interpret
			sections of the policy relating to maintaining confidential
			information and guide campuses through implementation of the
			policy as requested.</FONT></P>
		</TD>
	</TR>
</TABLE>
<P CLASS="western" ALIGN=CENTER STYLE="margin-bottom: 0in; line-height: 100%">
<B>NON-COMPETE POLICY</B></P>
<CENTER>
	<TABLE WIDTH=430 BORDER=1 BORDERCOLOR="#00000a" CELLPADDING=7 CELLSPACING=0>
		<COL WIDTH=53>
		<COL WIDTH=204>
		<COL WIDTH=128>
		<TR VALIGN=TOP>
			<TD WIDTH=53 HEIGHT=8>
				<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in"><BR>
				</P>
			</TD>
			<TD WIDTH=204>
				<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in">
				Release Date:</P>
				<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in">February
				2012</P>
			</TD>
			<TD WIDTH=128>
				<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in">
				Review Date:</P>
				<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in">June
				2013</P>
			</TD>
		</TR>
		<TR VALIGN=TOP>
			<TD WIDTH=53 HEIGHT=8>
				<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in">
				Version:</P>
				<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in">1.0</P>
			</TD>
			<TD WIDTH=204>
				<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in">
				Process Owner:</P>
				<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in">Human
				Resource 
				</P>
			</TD>
			<TD WIDTH=128>
				<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in; margin-bottom: 0in">
				Process Administrator:</P>
				<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.02in">Supervisors/HOD/HR</P>
			</TD>
		</TR>
	</TABLE>
</CENTER>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
<BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
<BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
<U><B>Objective </B></U>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
<BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
The nature of the industry which Pacific Sea BPO Services Inc. BPO
Services Inc. belongs is highly competitive. Employees working in the
BPO industry often transfer work taking with them all the information
that their previous company invested. As a result, unfair competition
is prevalent. 
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
<BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
To be fair, this policy is made based on the following reasons:</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
 
</P>
<OL>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">Protect
	the Company</P>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">Protect
	customer relationship</P>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">Enhance
	client&rsquo;s confidence</P>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">Protect
	the Company&rsquo;s investment in the training of employee</P>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
	Clarify expectation.</P>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">Shape
	ground rules for potential litigation in the future.</P>
</OL>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
<BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
 This policy is intended as a protection of Pacific Sea BPO Services
Inc. BPO Services Inc., not as a punishment of the employee.</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
<BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
<U><B>Definition</B></U></P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
<BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
<FONT SIZE=2>The term &ldquo;non-competition&rdquo; technically
refers to an arrangement that preclude a person from engaging in
certain acts of competition for a prescribed period of time within a
prescribed geographic area.&nbsp;</FONT></P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
<BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
<FONT SIZE=2><U><B>Policy</B></U></FONT></P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
<BR>
</P>
<OL>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
	At all times while the employee is employed or under contract and
	after its expiration or termination, the employee agrees to refrain
	from disclosing Pacific Sea BPO Services Inc. BPO Service Inc.
	customer lists, trade secrets, or other confidential material.  
	</P>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">Employee
	agrees to take reasonable security measures to prevent accidental
	disclosure and industrial espionage.</P>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">The
	employee agrees to use his/her best efforts to perform his duty and
	to abide by the non-disclosure and noncompetition terms of Handbook;</P>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
	After termination, expiration, resignation or separation of
	employment, the employee shall not to compete or seek employment to
	any company or association directly in competition   with Pacific
	Sea BPO Services Inc. BPO Services Inc., for a period of two (2)
	years within Metro Manila. 
	</P>
</OL>
<P ALIGN=JUSTIFY STYLE="margin-left: 0.5in; margin-bottom: 0in; line-height: 100%">
<BR>
</P>
<P ALIGN=JUSTIFY STYLE="margin-left: 0.5in; margin-bottom: 0in; line-height: 100%">
<BR>
</P>
<P ALIGN=JUSTIFY STYLE="margin-left: 0.5in; margin-bottom: 0in; line-height: 100%">
Competition means owning or working for a business of the following
type: 
</P>
<OL>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
	Online Sports Betting</P>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">Online
	Casino</P>
</OL>
<OL START=5>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">The
	Employee shall pay liquidated damages the amount of which shall be
	determined by the management for any violation of the covenant not
	to compete.</P>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">Any
	employee found to be in conspiracy in the violation of this policy
	shall be terminated immediately and shall also be required to pay
	the liquidated damages.</P>
	<LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">The
	Company reserves the right to file civil and criminal proceedings
	against the employee who violated the policy.</P>
</OL>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.25in; margin-bottom: 0in">
<BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.25in; margin-bottom: 0in">
<BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.25in; margin-bottom: 0in">
<BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.25in; margin-bottom: 0in">
<BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.25in; margin-bottom: 0in">
<BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.25in; margin-bottom: 0in">
<BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.25in; margin-bottom: 0in">
<BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.25in; margin-bottom: 0in">
<BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.25in; margin-bottom: 0in">
<BR>
</P>
<DIV TYPE=FOOTER>
	<P STYLE="margin-bottom: 0in"><BR>
	</P>
</DIV>


<?
include_once("./_tail.php");
?>
