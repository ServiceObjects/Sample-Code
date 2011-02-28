<?
/* SERVICE OBJECTS, INC.
*  Service: DOTS Address Geocode - US
*  Language: PHP 5 using SOAP 
*  Operation: GetBestMatch_V3Result
*  Note: The code being suggested in this file provides one possible solution using this particular service. There are
*  many other possible solutions to using this service which may fit a particular problem . Please contact support@serviceobjects.com for more * *  information
* 
*  Date Created:    7/9/2010
*  Last Modified:   1/4/2010
* 
*  Modified by: R. Munoz
 * WEBSITE
 * http://www.serviceobjects.com
 *
 * PRODUCT PAGE
 * http://www.serviceobjects.com/products/address/address-geocode-us
 *
 * FREE TRIAL
 * http://www.serviceobjects.com/dots-key?wsid=34
 *
 * SUPPORT EMAIL
 * support@serviceobjects.com
 *
 *
 * THIS CODE AND INFORMATION IS PROVIDED "AS IS" WITHOUT WARRANTY
 * OF ANY KIND, EITHER EXPRESSED OR IMPLIED, INCLUDING BUT NOT
 * LIMITED TO THE IMPLIED WARRANTIES OF MERCHANTIBILITY AND/OR
 * FITNESS FOR A PARTICULAR PURPOSE.
 *
 * */
?>
<html>
<head>
<title>DOTS Address Geocode - US</title>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>
<body id="page" class="yoopage font-medium width-wide">
<div id="page-body">
<div class="page-body-img">
	<div class="page-body-b">
    	<div class="wrapper floatholder">
		<div id="header">
				<div id="toolbar">
					<div class="floatbox ie_fix_floats">
							<div id="topmenu">
							</div><!--top menu closing div-->
					</div><!--floatbox ie_fix_floats closing div-->
				</div><!--toolbar closing div-->
                
				<div id="headerbar">
					<div class="floatbox ie_fix_floats">
							<div class="module deepest blank">
							</div><!--module deepest blank-->
					</div><!--floatbox ie_fix_floats-->
				</div><!--headerbar-->
							
				<div id="menubar">
						<div class="menubar-l"></div>
						<div class="menubar-r"></div>
						<div class="menubar-m">
                        	<div id="library_title"><h2>DOTS Address Geocode - US</h2></div>
                            </div>
				</div><!--menubar closing div-->
						
				<div id="menu">
				
				</div><!--menu closing div-->
				<div id="logo" style="margin-top:-10px">
					<p><img src="images/logo.jpg" width="206" height="64" /></p>
				</div><!--logo closing div-->
		</div><!--header closing div-->
        
              <div id="wrapper">
                	<div class="wrapper-container-t">
                    	<div class="wrapper-tl"></div>
                        <div class="wrapper-tr"></div>
                        <div class="wrapper-t"></div>
                    </div>
                    <div class="wrapper-b">
                   	  <div class="wrapper-lt">
                 			<div class="wrapper-r">
                 				<div class="wrapper-bl">
                                	<div class="wrapper-br">
                						<div class="wrapper-container">
                                         
               <div id="middle">
               		<div class="background">
                    	<div id="left">
                        	<div id="left_container" class="clearfix">
                            	<div class="mod-default mod-menu">
                                	<div class="module grey">
                                    	<div class="module-2">
                                        	<div class="module-3">
                                            	<div class="module-4 deepest">
                                                 <h3 class="module">
                                                    	<span class="module-2">
                                                        	<span class="module-3">
                                                            	<span class="color">Web Services</span>
                                                            </span>
                                                        </span>
                                                  </h3>
                                                	<ul class="menu">
                                                    	<li class="level1">
                                                        	<a target="_blank" class="level1" href="http://www.serviceobjects.com/products/address/address-geocode-us">
                                                            	<span>Product Info</span>
                                                            </a> 
                                                              
                                                        </li><!--li level1 closing tag-->
                                                        <li class="level1"><a target="_blank" class="level1 item1" href="http://www.serviceobjects.com/devguides/DOTS_Geocode_US.pdf">
                                                            	<span>Developer Guide</span>
                                                            </a> </li>
                                                         <li class="level1 active"><a target="_blank" class="level1 item1" href="http://www.serviceobjects.com/dots-key?wsid=34">
                                                            	<span>Free Trial</span>
                                                            </a>  </li>
                                                             <li class="level1"><a target="_blank" class="level1 item1" href="http://www.serviceobjects.com/support">
                                                            	<span>Support</span>
                                                            </a>  </li> 
                                                  </ul><!--ul menu closing tag-->
                                                </div><!--module-4 deepest-->
                                            </div><!--module 3 closing tag-->
                                        </div><!--module 2 closing tag-->
                                    </div><!--module grey closing tag-->	
                                </div><!--mod-default mod-menu closing tag-->
                                <div align="center"><a target="_blank" href="http://www.serviceobjects.com/dots-key?wsid=34"><img border="0" src="images/get_trial.jpg" width="187" height="54"/></a></div>
                        	</div><!--left container closing tag-->
                        </div><!--left closing tag-->
                        <div id="main">
                        	<div id="main_container" class="clearfix">
                            	<div id="mainmiddle" class="floatbox">
                                	<div id="content">
                                    	<div id="content_container"class="clearfix">
                                        <h4>DOTS Address Geocode - US Sample Form </h4>
<?php
// Original Author:  Cameron Michaelson ccmichaelson@hotmail.com
// Modified By: Donnie Karns dkarns@serviceobjects.com
// Date:   	4/19/2006
// Notes:   This is an example PHP file that consumes the
//		ServiceObjects DOTS GeoCode web service
//		using the native PHP5 extension SoapClient class.

// (Optional) This turns off the WSDL caching, which is on by default.
ini_set("soap.wsdl_cache_enabled","0");

// Set these values per web service <as needed> 
$wsdlUrl = "http://trial.serviceobjects.com/gcr/GeoCoder.asmx?WSDL";

// Create the SoapClient and pass the URL to the WSDL file and optional parameters as needed 
//$soapClient = new SoapClient($wsdlUrl, array("trace" => true, "exceptions" => false,));
$soapClient = new SoapClient($wsdlUrl);

//Initialize form-related variables
$Address = "";
$City = "";
$State = "";
$Zip = "";
$LicenseKey = "";
$Action = "";

// If GET information exists, insert into variables
// These variables are used to populate the input fields after a submit.
if(isset($_GET['Address']))
	$Address = $_GET['Address'];
	
if(isset($_GET['City']))
	$City = $_GET['City'];
	
if(isset($_GET['State']))
	$State = $_GET['State'];
	
if(isset($_GET['Zip']))
	$Zip = $_GET['Zip'];
	
// http get of the key
if(isset($_GET['LicenseKey']))
	$LicenseKey = $_GET['LicenseKey'];

// Variable to tell if the form was submitted
if(isset($_GET['Action']))
	$Action = $_GET["Action"];
	

?>

<form method="GET">

<table>
	<tr>
		<td>Address: </td>
		<td><input type="text" name="Address" value="<?=$Address?>"></td>
	</tr>
	<tr>
		<td>City: </td>
		<td><input type="text" name="City" value="<?=$City?>"></td>
	</tr>
	<tr>
		<td>State: </td>
		<td><input type="text" name="State" value="<?=$State?>"></td>
	</tr>
	<tr>
		<td>Zip: </td>
		<td><input type="text" name="Zip" value="<?=$Zip?>"></td>
	</tr>
	<tr>
		<td>License Key: </td>
		<td><input type="text" name="LicenseKey" value="<?=$LicenseKey?>"></td>
	</tr>
    
	<tr>
		<td colspan="2"><br /><input type="image" src="images/submit-button.jpg" name="Action" value="Submit"></td>
	</tr>
</table>	

</form>

<?

// Only make Soap request or show the results table if the form was submitted.
if ($Action == "Submit") {
	
// Invoke the getBestMatch operation
	$SoapResponse = 
		$soapClient->GetBestMatch_V3(array(
		"Address" => $Address,
		"City" => $City,
		"State" => $State,
		"PostalCode" => $Zip,
		"LicenseKey" => $LicenseKey));
	
	//Store result node in a more convenient variable
	$ResultNode = $SoapResponse->GetBestMatch_V3Result;

	?>
	
	<table>
	
	<?
		if (!isset($ResultNode->Error)) //If there are no errors, display results
		{
			?>
			
				<tr>
					<td><b>Latitude:</b></td>
					<td><?=$ResultNode->Latitude?></td>
				</tr>
				<tr>
					<td><b>Longitude:</b></td>
					<td><?=$ResultNode->Longitude?></td>
				</tr>
				<tr>
					<td><b>Zip:</b></td>
					<td><?=$ResultNode->Zip?></td>
				</tr>
				<tr>
					<td><b>Tract:</b></td>
					<td><?=$ResultNode->Tract?></td>
				</tr>
				<tr>
					<td><b>Block:</b></td>
					<td><?=$ResultNode->Block?></td>
				</tr>
                <tr>
               		<td><b>Level</b></td>
                    <td><?=$ResultNode->Level?></td>
                </tr>
                <tr>
					<td><b>Level Description:</b></td>
					<td><?=$ResultNode->LevelDescription?></td>
				</tr>
                <tr>
                	<td><b>StateFIPS</b></td>
                    <td><?=$ResultNode->StateFIPS?></td>
                </tr>
                <tr>
                	<td><b>CountyFIPS</b></td>
                    <td><?=$ResultNode->CountyFIPS?></td>
                </tr>
				
			<?
		}
		else //If there are errors
		{
			//Store error node in more convenient variable
			$ErrorNode = $ResultNode->Error;
			?>
				<tr>
					<td><b>Error Number:</b></td>
					<td><?=$ErrorNode->Number?></td>
				</tr>
				<tr>
					<td><b>Error Description:</b></td>
					<td><?=$ErrorNode->Desc?></td>
				</tr>
				<?
		}
	?>
	
	</table>
	
	<?
	
}
?>
</div><!--content_container closing tag-->
           						  </div><!--content closing tag-->
           					  </div><!--mainmiddle closing tag-->
               				</div><!--main_container closing tag-->
               			  </div><!--main closing tag-->
                		</div><!--background closing tag-->
                	</div><!--middle closing tag-->
                    <div id="footer">&copy;2010 Service Objects, Inc.  |  27 E.Cota St.  |  Santa Barbara, CA 93101  |  1.805.963.1700  |  toll free: 1.800.694.6269  |  fax: 1.805.963.9179</div>
                					</div><!--wrapper-container closing tag-->
                				</div><!--wrapper-br closing tag-->
                			</div><!--wrapper-bl closing tag-->
                			</div><!--wrapper-r closing tag-->
               		  </div><!--wrapper-1 closing tag-->
               	  </div><!--wrapper-b closing tag-->
          </div><!--wrapper closing tag-->
      </div><!--wrapper floatholder closing tag-->
</div><!--page body b closing tag-->
</div><!--page body-img closing tag-->
</div><!--page-body closing tag-->
               

</body>
</html>