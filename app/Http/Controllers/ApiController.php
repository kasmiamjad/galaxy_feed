<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function sendCurlRequest()
    {
        // Initialize cURL session
        $ch = curl_init();

        // Set cURL options
        curl_setopt($ch, CURLOPT_URL, 'https://e650144-iflmap.hcisbt.sa1.hana.ondemand.com/http/SNC/SSV/POST/InventoryInfo');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, '<cXML version="1.2.033" payloadID="AN0141312069420240724T140138@championx.com" timestamp="2024-07-24T14:01:38-5:00" xml:lang="en-US">
        <Header>
        <From>
        <Credential domain="NetworkID">
        <Identity>AN01413120694-T</Identity>
        </Credential>
        </From>
        <To>
        <Credential domain="NetworkID">
        <Identity>AN01402011954-T</Identity>
        </Credential>
        </To>
        <Sender>
        <Credential domain="NetworkID">
        <Identity>AN01413120694-T</Identity>
        </Credential>
        <UserAgent>SCMSupplier</UserAgent>
        </Sender>
        </Header>
        <Message deploymentMode="test">
        <ProductReplenishmentMessage>
        <ProductReplenishmentHeader messageID="MFV-AN01413120694_20240724T140138" creationDate="2024-07-24T14:01:38-5:00" processType="ManufacturingVisibility"/>
        <ProductReplenishmentDetails>
        <ItemID>
        <SupplierPartID/>
        <BuyerPartID>1001046500</BuyerPartID>
        </ItemID>
        <Description xml:lang="EN">BACTRON KCB-310</Description>
        <Contact role="locationTo">
        <Name xml:lang="EN"/>
        <IdReference identifier="Dammam" domain="buyerLocationID"/>
        </Contact>
        <ReplenishmentTimeSeries type="manufacturingOrder">
        <TimeSeriesDetails>
        <Period startDate="2024-07-24T14:01:00-5:00" endDate="2024-07-24T14:01:00-5:00"/>
        <TimeSeriesQuantity quantity="4600004241">
        <UnitOfMeasure>PL</UnitOfMeasure>
        </TimeSeriesQuantity>
        </TimeSeriesDetails>
        </ReplenishmentTimeSeries>
        <ReplenishmentTimeSeries type="custom" customType="RMCountryofOrigin">
        <TimeSeriesDetails>
        <Period startDate="2024-07-24T14:01:00-5:00" endDate="2024-07-24T14:01:00-5:00"/>
        <TimeSeriesQuantity quantity="966">
        <UnitOfMeasure>PL</UnitOfMeasure>
        </TimeSeriesQuantity>
        </TimeSeriesDetails>
        </ReplenishmentTimeSeries>
        <ReplenishmentTimeSeries type="custom" customType="SupplierQualityInspectionstock">
        <TimeSeriesDetails>
        <Period startDate="2024-07-24T14:01:00-5:00" endDate="2024-07-24T14:01:00-5:00"/>
        <TimeSeriesQuantity quantity="222.000">
        <UnitOfMeasure>PL</UnitOfMeasure>
        </TimeSeriesQuantity>
        </TimeSeriesDetails>
        </ReplenishmentTimeSeries>
        <ReplenishmentTimeSeries type="custom" customType="SupplierOnHandStock">
        <TimeSeriesDetails>
        <Period startDate="2024-07-24T14:01:00-5:00" endDate="2024-07-24T14:01:00-5:00"/>
        <TimeSeriesQuantity quantity="222.053">
        <UnitOfMeasure>PL</UnitOfMeasure>
        </TimeSeriesQuantity>
        </TimeSeriesDetails>
        </ReplenishmentTimeSeries>
        <ReplenishmentTimeSeries type="custom" customType="SupplierOpenPOs">
        <TimeSeriesDetails>
        <Period startDate="2024-07-24T14:01:00-5:00" endDate="2024-07-24T14:01:00-5:00"/>
        <TimeSeriesQuantity quantity="222.333">
        <UnitOfMeasure>PL</UnitOfMeasure>
        </TimeSeriesQuantity>
        </TimeSeriesDetails>
        </ReplenishmentTimeSeries>
        <ReplenishmentTimeSeries type="custom" customType="SupplierOnHandunderManufacturing">
        <TimeSeriesDetails>
        <Period startDate="2024-07-24T14:01:00-5:00" endDate="2024-07-24T14:01:00-5:00"/>
        <TimeSeriesQuantity quantity="222.000">
        <UnitOfMeasure>PL</UnitOfMeasure>
        </TimeSeriesQuantity>
        </TimeSeriesDetails>
        </ReplenishmentTimeSeries>
        <ReplenishmentTimeSeries type="custom" customType="SupplierTotalonHandStock">
        <TimeSeriesDetails>
        <Period startDate="2024-07-24T14:01:00-5:00" endDate="2024-07-24T14:01:00-5:00"/>
        <TimeSeriesQuantity quantity="222.053">
        <UnitOfMeasure>PL</UnitOfMeasure>
        </TimeSeriesQuantity>
        </TimeSeriesDetails>
        </ReplenishmentTimeSeries>
        <ReplenishmentTimeSeries type="custom" customType="SupplierRMOnHandOnOrderETA">
        <TimeSeriesDetails>
        <Period startDate="2024-07-24T14:01:00-5:00" endDate="2024-07-24T14:01:00-5:00"/>
        <TimeSeriesQuantity quantity="222.000">
        <UnitOfMeasure>PL</UnitOfMeasure>
        </TimeSeriesQuantity>
        </TimeSeriesDetails>
        </ReplenishmentTimeSeries>
        </ProductReplenishmentDetails>
        <ProductReplenishmentDetails>
        <ItemID>
        <SupplierPartID/>
        <BuyerPartID>1000022477</BuyerPartID>
        </ItemID>
        <Description xml:lang="EN">CORTRON RN-477</Description>
        <Contact role="locationTo">
        <Name xml:lang="EN"/>
        <IdReference identifier="Dammam" domain="buyerLocationID"/>
        </Contact>
        <ReplenishmentTimeSeries type="manufacturingOrder">
        <TimeSeriesDetails>
        <Period startDate="2024-07-24T14:01:00-5:00" endDate="2024-07-24T14:01:00-5:00"/>
        <TimeSeriesQuantity quantity="4600004269">
        <UnitOfMeasure>DR</UnitOfMeasure>
        </TimeSeriesQuantity>
        </TimeSeriesDetails>
        </ReplenishmentTimeSeries>
        <ReplenishmentTimeSeries type="custom" customType="RMCountryofOrigin">
        <TimeSeriesDetails>
        <Period startDate="2024-07-24T14:01:00-5:00" endDate="2024-07-24T14:01:00-5:00"/>
        <TimeSeriesQuantity quantity="966">
        <UnitOfMeasure>DR</UnitOfMeasure>
        </TimeSeriesQuantity>
        </TimeSeriesDetails>
        </ReplenishmentTimeSeries>
        <ReplenishmentTimeSeries type="custom" customType="SupplierQualityInspectionstock">
        <TimeSeriesDetails>
        <Period startDate="2024-07-24T14:01:00-5:00" endDate="2024-07-24T14:01:00-5:00"/>
        <TimeSeriesQuantity quantity="0.000">
        <UnitOfMeasure>DR</UnitOfMeasure>
        </TimeSeriesQuantity>
        </TimeSeriesDetails>
        </ReplenishmentTimeSeries>
        <ReplenishmentTimeSeries type="custom" customType="SupplierOnHandStock">
        <TimeSeriesDetails>
        <Period startDate="2024-07-24T14:01:00-5:00" endDate="2024-07-24T14:01:00-5:00"/>
        <TimeSeriesQuantity quantity="500.000">
        <UnitOfMeasure>DR</UnitOfMeasure>
        </TimeSeriesQuantity>
        </TimeSeriesDetails>
        </ReplenishmentTimeSeries>
        <ReplenishmentTimeSeries type="custom" customType="SupplierOpenPOs">
        <TimeSeriesDetails>
        <Period startDate="2024-07-24T14:01:00-5:00" endDate="2024-07-24T14:01:00-5:00"/>
        <TimeSeriesQuantity quantity="123.000">
        <UnitOfMeasure>DR</UnitOfMeasure>
        </TimeSeriesQuantity>
        </TimeSeriesDetails>
        </ReplenishmentTimeSeries>
        <ReplenishmentTimeSeries type="custom" customType="SupplierOnHandunderManufacturing">
        <TimeSeriesDetails>
        <Period startDate="2024-07-24T14:01:00-5:00" endDate="2024-07-24T14:01:00-5:00"/>
        <TimeSeriesQuantity quantity="411.000">
        <UnitOfMeasure>DR</UnitOfMeasure>
        </TimeSeriesQuantity>
        </TimeSeriesDetails>
        </ReplenishmentTimeSeries>
        <ReplenishmentTimeSeries type="custom" customType="SupplierTotalonHandStock">
        <TimeSeriesDetails>
        <Period startDate="2024-07-24T14:01:00-5:00" endDate="2024-07-24T14:01:00-5:00"/>
        <TimeSeriesQuantity quantity="255.000">
        <UnitOfMeasure>DR</UnitOfMeasure>
        </TimeSeriesQuantity>
        </TimeSeriesDetails>
        </ReplenishmentTimeSeries>
        <ReplenishmentTimeSeries type="custom" customType="SupplierRMOnHandOnOrderETA">
        <TimeSeriesDetails>
        <Period startDate="2024-07-24T14:01:00-5:00" endDate="2024-07-24T14:01:00-5:00"/>
        <TimeSeriesQuantity quantity="214.000">
        <UnitOfMeasure>DR</UnitOfMeasure>
        </TimeSeriesQuantity>
        </TimeSeriesDetails>
        </ReplenishmentTimeSeries>
        </ProductReplenishmentDetails>
        </ProductReplenishmentMessage>
        </Message>
        </cXML>');
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/xml',
            'Authorization: Bearer eyJhbGciOiJSUzI1NiIsIng1dSI6Imh0dHBzOi8vb2F1dGhhc3NlcnZpY2VzLnNhMS5oYW5hLm9uZGVtYW5kLmNvbS9vYXV0aDIvYXBpL3YxL2p3dC9jZXJ0aWZpY2F0ZSIsInR5cCI6IkpXVCIsImtpZCI6IjIifQ.eyJpc3MiOiJodHRwczovL29hdXRoYXNzZXJ2aWNlcy5zYTEuaGFuYS5vbmRlbWFuZC5jb20iLCJzdWIiOnsibmFtZSI6IlAyMDA4NTAxNTQyIiwiaWRwTmFtZSI6Imh0dHBzOi8vYWNjb3VudHMuc2FwLmNvbSIsImNvbnRleHQiOnsiYXR0cmlidXRlcyI6eyJncmFudF90eXBlIjoicGFzc3dvcmQiLCJ0b2tlblZhbGlkaXR5IjoiNDMyMDAwMDAiLCJ0ZW5hbnQiOiI2OTA5ZWFmMi1hYmJlLTQ5MDgtYWY2YS1iOGE0M2FmNWEwZmIifSwibXVsdGlWYWx1ZUF0dHJpYnV0ZXMiOnsiYXVkaWVuY2UiOlsiaHR0cHM6Ly9hY2NvdW50cy5zYXAuY29tIiwiNjkwOWVhZjItYWJiZS00OTA4LWFmNmEtYjhhNDNhZjVhMGZiX2h0dHBzOi8vYWNjb3VudHMuc2FwLmNvbSJdfX0sImF0dHJpYnV0ZXMiOlt7Im5hbWVzcGFjZSI6ImNvbS5zYXAuc2VjdXJpdHkuc2FtbDIiLCJuYW1lIjoibGFzdG5hbWUiLCJ2YWx1ZXMiOlsiQWxvZ2FpbCJdfSx7Im5hbWVzcGFjZSI6ImNvbS5zYXAuc2VjdXJpdHkuc2FtbDIiLCJuYW1lIjoibmFtZV9pZCIsInZhbHVlcyI6WyJ1aWQiXX0seyJuYW1lc3BhY2UiOiJjb20uc2FwLnNlY3VyaXR5LnNhbWwyIiwibmFtZSI6ImVtYWlsIiwidmFsdWVzIjpbIm11bmRlckBnYWxheHlzYS5uZXQiXX0seyJuYW1lc3BhY2UiOiJjb20uc2FwLnNlY3VyaXR5LnNhbWwyIiwibmFtZSI6ImZpcnN0bmFtZSIsInZhbHVlcyI6WyJNdW5kZXIiXX0seyJuYW1lc3BhY2UiOiJjb20uc2FwLnNlY3VyaXR5LnNhbWwyIiwibmFtZSI6Im5hbWUiLCJ2YWx1ZXMiOlsiUDIwMDg1MDE1NDIiXX0seyJuYW1lc3BhY2UiOiJjb20uc2FwLnNlY3VyaXR5LnNhbWwyIiwibmFtZSI6InR5cGUiLCJ2YWx1ZXMiOlsicHVibGljIl19XX0sImF1ZCI6WyJodHRwczovL2FjY291bnRzLnNhcC5jb20iLCI2OTA5ZWFmMi1hYmJlLTQ5MDgtYWY2YS1iOGE0M2FmNWEwZmJfaHR0cHM6Ly9hY2NvdW50cy5zYXAuY29tIl0sImV4cCI6MTcyNDI2NDMzMDE0MCwiaWF0IjoxNzI0MjIxMTMwMTQwLCJuYmYiOjE3MjQyMjExMzAxNDAsImp0aSI6IjQwNWJjNmM0LTgyYmQtNGNiYS05YzA3LTY2OGE4Nzg5NGMzMCJ9.exW66N/VeN5HsdG2y3keTmfHjMcTHG3IYVfywHpzhWcwE9xfiULDYA6GVF1mSWIFYBlJYOnWpCaS0ROPCOikUkDjJyNV9zdUVwT4cvTW7L961sNcOa3EmlO9KGPXxPYcQLmgB8KBlG2ADwe6hFR36BDTnUoBGWb1VFZnlPJXvdJmJccjwdGPmQrQb8NryqBB/r4Cwhq7PfbXF9BduhbJRDf7mgNLXYb1pJiFLFVMNlFBATNZTOpYQ0oVGPrXHltnS0gRowUg/vPMGNF6ZM5L4JYRRsMLi1deP5NQTZCyJlofmpthTLPtQz4F+OQ9/ep0L/xK3atS7iMND7PCIBEjIgHiEdqplmadhTsUQ7kDyr+GQ0vqnMlYW5uLMwkwm0B5GmhKFfVplLbCzkMG3A3OhAJlUEJpu8JPt8EipWEp7jqM3uuhiXctI6Bp+ugJWz+jd04rTAkVbl2zLP8+uWm5pkmgFsNfmjj0316OxHpK27EiBs0GZa1Xt9U36Rtesp939q7fUbnCgt28Y+eUPIQiKdLPDB21Pt5BUa1QqrC6b52GfjLhJQDCMWEUgnRN1HAApFU8AdsxPHTNiM+uV+aJAp00HYRAo7BNLruGrHdK9IsC5TIwDg2MvoLHch4FFwAodWQe27OigmaoEnjk9T0/SvsDXXLox7AzVpUEYNWKOFY'
        ]);

        // Execute cURL request
        $response = curl_exec($ch);

        // Check for errors
        if (curl_errno($ch)) {
            $error_msg = curl_error($ch);
            // Handle the error appropriately
            curl_close($ch);
            return response()->json(['error' => $error_msg], 500);
        }

        // Close cURL session
        curl_close($ch);
        //dd($response);
        // Return the response
        return response()->json(['response' => $response]);
        //return view('response-view', ['message' => $response]);
    }
}
