jQuery(document).ready(function(){
	
	//var default_url = "https://giving.ucla.edu/campaign/Donate.aspx?SiteNum=790&al=y&lg=y";
		
	var queryString = "";
	
	var public_id = "";
	var lname = "";
	var fname = "";
	var code = "";
	var finder = "";
	var scode = "";
	var fund = "";
	var f2 = "";
	var f3 = "";
	var f4 = "";
	var f5 = "";
	var f6 = "";
	var amount = "";
	var a2 = "";
	var a3 = "";
	var a4 = "";
	var a5 = "";
	var a6 = "";
	var donor_id = "";
	var sort = "";
	var orgnum ="";
		
	var qsObj = jQuery.deparam.querystring();
	
	public_id = qsObj.mg || qsObj.MG || qsObj.Mg;
	fname = qsObj.FName || qsObj.Fname || qsObj.fname || qsObj.fName || qsObj.FNAME;
	lname = qsObj.LName || qsObj.Lname || qsObj.lname || qsObj.lName || qsObj.LNAME;
	code = qsObj.Code || qsObj.code || qsObj.CODE;
	scode = qsObj.SCode || qsObj.Scode || qsObj.sCode || qsObj.scode || qsObj.SCODE;
	finder = qsObj.Finder || qsObj.finder || qsObj.FINDER;
	fund = qsObj.Fund || qsObj.fund || qsObj.FUND;
	
	f2 = qsObj.f2 || qsObj.F2;
	f3 = qsObj.f3 || qsObj.F3;
	f4 = qsObj.f4 || qsObj.F4;
	f5 = qsObj.f5 || qsObj.F5;
	f6 = qsObj.f6 || qsObj.F6;
	
	amount = qsObj.amount || qsObj.Amount || qsObj.AMOUNT;
	
	a2 = qsObj.a2 || qsObj.A2;
	a3 = qsObj.a3 || qsObj.A3;
	a4 = qsObj.a4 || qsObj.A4;
	a5 = qsObj.a5 || qsObj.A5;
	a6 = qsObj.a6 || qsObj.A6;
	
	donor_id = qsObj.donorid || qsObj.donorId || qsObj.Donorid || qsObj.DONORID || qsObj.DonorId || qsObj.DonorID;
	
	sort = qsObj.sort || qsObj.Sort || qsObj.SORT;
	
	orgnum = qsObj.orgnum || qsObj.OrgNum || qsObj.orgNum || qsObj.ORGNUM;
	

	if ((code != null) && (code.replace(/\s/g,"") != "") || (public_id != null) && (public_id.replace(/\s/g,"") != "") || (fund != null) && (fund.replace(/\s/g,"") != "") || (orgnum != null) && (orgnum.replace(/\s/g,"") != "")) {
		
	    queryString = jQuery.param.querystring( queryString, { 
		    lname:lname,
			fname:fname, 
		    mg:public_id, 
		    code:code, 
		    finder:finder, 
		    scode:scode, 
		    fund:fund,
		    f2:f2,
			f3:f3,
			f4:f4,
			f5:f5,
			f6:f6,
			amount:amount,
			a2:a2,
			a3:a3,
			a4:a4,
			a5:a5,
			a6:a6,
			donorid:donor_id,
			sort:sort,
			orgnum:orgnum
		    
		});
	
		//give now buttons
		//jQuery(".btn").attr("href", "https://" + default_url);
		
		//var link = jQuery(".autopopulate").attr("href");
		
		//jQuery(".autopopulate").attr("href", this.link + redirectUrl)
	
	/*
		// Modify just .autopopulate links
			
		jQuery(".autopopulate").each(function(){
			
			var href = jQuery(this).attr('href');
			
			if (href) {
				// jQuery(this).attr('href', href + queryString);
				jQuery(this).attr('href', jQuery.param.querystring( href, queryString));
			}				
		});
		
	*/
		
		// Modify all links on page that are either class=autopopulate or that match the target domain
		
		jQuery('a').each(function()
		{
		    var href = jQuery(this).attr('href'); // Link to update
		    var loc = "uclafund.ucla.edu"; // Only modify links pointing to UCLA Fund website pages
			var loc2 = "myaccount.support.ucla.edu"; // Only modify links pointing to My Account pages
			var loc3 = "giving.ucla.edu"; // Only modify links pointing to OLG pages
		    // var loc = window.location.host; // Modify any links pointing the current domain
		
			if(href && (jQuery(this).is(".autopopulate") || href.toLowerCase().indexOf(loc.toLowerCase()) >= 0 || href.toLowerCase().indexOf(loc2.toLowerCase()) >= 0 || href.toLowerCase().indexOf(loc3.toLowerCase()) >= 0)) { 
				// If this link is .autopopulate or points to a page on the target domain
		        
		        jQuery(this).attr('href', jQuery.param.querystring( href, queryString));
		        
		        // Probably a slightly faster version for simple append
		        // href += (href.match(/\?/) ? '&' : '?') + queryString; // use either ? or & depending on if there's already a query string
		        // jQuery(this).attr('href', href);
		    }
		});
			
	}
		   
});