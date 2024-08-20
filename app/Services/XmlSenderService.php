<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class XmlSenderService
{
    public function sendXmlData($xmlContent)
    {
        // Your API endpoint
        $url = 'https://e650144-iflmap.hcisbt.sa1.hana.ondemand.com/http/SNC/SSV/POST/InventoryInfo';

        // OAuth 2.0 Bearer Token (Replace with your token)
        $token = 'eyJhbGciOiJSUzI1NiIsIng1dSI6Imh0dHBzOi8vb2F1dGhhc3NlcnZpY2VzLnNhMS5oYW5hLm9uZGVtYW5kLmNvbS9vYXV0aDIvYXBpL3YxL2p3dC9jZXJ0aWZpY2F0ZSIsInR5cCI6IkpXVCIsImtpZCI6IjIifQ.eyJpc3MiOiJodHRwczovL29hdXRoYXNzZXJ2aWNlcy5zYTEuaGFuYS5vbmRlbWFuZC5jb20iLCJzdWIiOnsibmFtZSI6IlAyMDA4NTAxNTQyIiwiaWRwTmFtZSI6Imh0dHBzOi8vYWNjb3VudHMuc2FwLmNvbSIsImNvbnRleHQiOnsiYXR0cmlidXRlcyI6eyJncmFudF90eXBlIjoicGFzc3dvcmQiLCJ0b2tlblZhbGlkaXR5IjoiNDMyMDAwMDAiLCJ0ZW5hbnQiOiI2OTA5ZWFmMi1hYmJlLTQ5MDgtYWY2YS1iOGE0M2FmNWEwZmIifSwibXVsdGlWYWx1ZUF0dHJpYnV0ZXMiOnsiYXVkaWVuY2UiOlsiaHR0cHM6Ly9hY2NvdW50cy5zYXAuY29tIiwiNjkwOWVhZjItYWJiZS00OTA4LWFmNmEtYjhhNDNhZjVhMGZiX2h0dHBzOi8vYWNjb3VudHMuc2FwLmNvbSJdfX0sImF0dHJpYnV0ZXMiOlt7Im5hbWVzcGFjZSI6ImNvbS5zYXAuc2VjdXJpdHkuc2FtbDIiLCJuYW1lIjoibGFzdG5hbWUiLCJ2YWx1ZXMiOlsiQWxvZ2FpbCJdfSx7Im5hbWVzcGFjZSI6ImNvbS5zYXAuc2VjdXJpdHkuc2FtbDIiLCJuYW1lIjoibmFtZV9pZCIsInZhbHVlcyI6WyJ1aWQiXX0seyJuYW1lc3BhY2UiOiJjb20uc2FwLnNlY3VyaXR5LnNhbWwyIiwibmFtZSI6ImVtYWlsIiwidmFsdWVzIjpbIm11bmRlckBnYWxheHlzYS5uZXQiXX0seyJuYW1lc3BhY2UiOiJjb20uc2FwLnNlY3VyaXR5LnNhbWwyIiwibmFtZSI6ImZpcnN0bmFtZSIsInZhbHVlcyI6WyJNdW5kZXIiXX0seyJuYW1lc3BhY2UiOiJjb20uc2FwLnNlY3VyaXR5LnNhbWwyIiwibmFtZSI6Im5hbWUiLCJ2YWx1ZXMiOlsiUDIwMDg1MDE1NDIiXX0seyJuYW1lc3BhY2UiOiJjb20uc2FwLnNlY3VyaXR5LnNhbWwyIiwibmFtZSI6InR5cGUiLCJ2YWx1ZXMiOlsicHVibGljIl19XX0sImF1ZCI6WyJodHRwczovL2FjY291bnRzLnNhcC5jb20iLCI2OTA5ZWFmMi1hYmJlLTQ5MDgtYWY2YS1iOGE0M2FmNWEwZmJfaHR0cHM6Ly9hY2NvdW50cy5zYXAuY29tIl0sImV4cCI6MTcyNDE3MzQyNzg0NCwiaWF0IjoxNzI0MTMwMjI3ODQ0LCJuYmYiOjE3MjQxMzAyMjc4NDQsImp0aSI6IjczMDlkNmU1LTEyY2ItNDZmMy04MDkzLTM0OTFhZTNlMTc4OCJ9.Hu0zAit3e7mzqKduMWLG5yXZAdmDGYtmaP1eOEBbGvHf1uaS8YVWAKZbesH1JU1hkyOMI0F7PYS5C6japF/SvCMNHKWItcr8ZxZi73p5BV4aytlZSNQYwTDKHU123N3yfa44iJKQ++yvuT7xK59oExE7TZidRg0nKPpA0qS349x+QnG3tggjDOSUeX+TTG2j95MYjZ97p0l6ehR2iobsZE6nsjVeIKbYo0mOkhd5J12pG/1CJDgX00Tkc2CRWrs0/4ztCm1HTCDrxXJjxsjd6CWuswsBXoAUPENNFk5M9iRDhqSTza8Q5rNKMDdKrANZ4qAKtnIdUgALxc0LbEGuUvEeg2u1g/rKiYOgUGC1WQj/ZZa1hPnAIixm/RtB3uY4Ri1NQ6Uoc0ymxOoGpA891RPlU0cxV/EqpKtCU9tZuIkFDRjLrbZErVN/OrE5LHzWmj4EULhATbhFokEwwzbUN/nJNpYKTrLGxgESpLvBAoNzh9yvUbgEj9bPyidVdXp+Z/hAs6IuldISkPheg96XQ0vyqinpq7BrJpKAk+/aWBlDK1/oqK9/kyHIou0aIRQh+QBhsxPYTHKMiiz5YAglmMZvGyNOp/Ls+kG6MOVQfrHREng7pNgDp+j5gFSj71oKlHOkvFQKCUIb03mY/jIKmHj4egkEfd+1tLELJVhux+M';

        // Make the HTTP POST request with the XML data
        $response = Http::withToken($token)
            ->withHeaders([
                'Content-Type' => 'application/xml',
            ])
            ->post($url, $xmlContent);

        // Handle response
        if ($response->successful()) {
            // Successful response
            return $response->body();
        } else {
            // Error handling
            throw new \Exception("Error: " . $response->status() . " - " . $response->body());
        }
    }
}
