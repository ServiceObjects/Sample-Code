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
</head>
<body>
                                    	<div>
                                        <h4>DOTS Address Geocode - US Sample Form </h4>
<?php
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
</body>
</html>