<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ZohoController extends Controller
{
    public function getContactsRoles()
    {
        $accessToken = $this->getAccessToken();
        $response = Http::withHeaders(['Authorization' => 'Zoho-oauthtoken '.$accessToken])->get('https://www.zohoapis.com/crm/v5/Contacts/roles');
        return $response;
    }

    public function getLeads(string $idLead)
    {
        $accessToken = $this->getAccessToken();
        $response = Http::withHeaders(['Authorization' => 'Zoho-oauthtoken '.$accessToken])->get('https://www.zohoapis.com/crm/v5/Leads/'.$idLead);
        return $response;
    }

    public function getContacts(string $idContact)
    {
        $accessToken = $this->getAccessToken();
        $response = Http::withHeaders(['Authorization' => 'Zoho-oauthtoken '.$accessToken])->get('https://www.zohoapis.com/crm/v5/Contacts/'.$idContact);
        return $response;
    }

    public function getAccounts(string $idAccount)
    {
        $accessToken = $this->getAccessToken();
        $response = Http::withHeaders(['Authorization' => 'Zoho-oauthtoken '.$accessToken])->get('https://www.zohoapis.com/crm/v5/Accounts/'.$idAccount);
        return $response;
    }

    private function getAccessToken()
    {
        $clientId = '1000.WNR3KQMXDU96TO9T8AJBO2ZY1FAQGJ';
        $clientSecret = 'b5b260ac9ff64dd6dc4d45641f223904d2ed91863b';
        $refreshToken = '1000.f7ece90fcb1a3cfded78ac9459671171.0d5e1ddb777cdf2543695a2b3f937623';
        $grant_type = 'refresh_token';

        $response = Http::post('https://accounts.zoho.com/oauth/v2/token?refresh_token='.$refreshToken.'&client_id='.$clientId.'&client_secret='.$clientSecret.'&grant_type=refresh_token');
        $accessToken = json_decode($response)->access_token;
        return $accessToken;
    }
}
