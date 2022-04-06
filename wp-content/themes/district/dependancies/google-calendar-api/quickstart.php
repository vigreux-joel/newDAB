<?php 

require __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '\..\dateToFrench.php';

/* POUR REFRESH LE TOKEN DE-COMMENTER CETTE CONDITION */
/* if (php_sapi_name() != 'cli') {
    throw new Exception('This application must be run on the command line.');
} */

/**
 * Returns an authorized API client.
 * @return Google_Client the authorized client object
 */
function getClient()
{
    $client = new Google_Client();
    $client->setApplicationName('Google Calendar API PHP Quickstart');
    $client->setScopes(Google_Service_Calendar::CALENDAR_READONLY);
    $client->setAuthConfig(__DIR__.'/credentials.json');
    $client->setAccessType('offline');
    $client->setPrompt('select_account consent');

    // Load previously authorized token from a file, if it exists.
    // The file token.json stores the user's access and refresh tokens, and is
    // created automatically when the authorization flow completes for the first
    // time.
    $tokenPath = __DIR__.'/token.json';
    if (file_exists($tokenPath)) {
        $accessToken = json_decode(file_get_contents($tokenPath), true);
        $client->setAccessToken($accessToken);
    }

    // If there is no previous token or it's expired.
    if ($client->isAccessTokenExpired()) {
        var_dump("Token Expiré");
        // Refresh the token if possible, else fetch a new one.
        if(file_exists(__DIR__."/refreshToken.json")){
            $refreshTokenVal = json_decode(file_get_contents(__DIR__."/refreshToken.json"), true);
            $client->fetchAccessTokenWithRefreshToken($refreshTokenVal['refresh_token']);
        } else {
            // Request authorization from the user.
            $authUrl = $client->createAuthUrl();
            printf("Open the following link in your browser:\n%s\n", $authUrl);
            print 'Enter verification code: ';
            $authCode = trim(fgets(STDIN));

            // Exchange authorization code for an access token.
            $accessToken = $client->fetchAccessTokenWithAuthCode($authCode);
            $client->setAccessToken($accessToken);

            // Check to see if there was an error.
            if (array_key_exists('error', $accessToken)) {
                throw new Exception(join(', ', $accessToken));
            }
        }
        // Save the token to a file.
        if (!file_exists(dirname($tokenPath))) {
            mkdir(dirname($tokenPath), 0700, true);
        }
        file_put_contents($tokenPath, json_encode($client->getAccessToken()));
    }
    return $client;
}

    // Get the API client and construct the service object.
    $client = getClient();
    $service = new Google_Service_Calendar($client);

    // Print the next 10 events on the user's calendar.
    $calendarId = 'lmjiu2v56i8ohcvojj1q2cg3fk@group.calendar.google.com';
    $optParams = array(
        'maxResults' => 10,
        'orderBy' => 'startTime',
        'singleEvents' => true,
        'timeMin' => date('c'),
    );

    $results = $service->events->listEvents($calendarId, $optParams);
    $events = $results->getItems();

    if (empty($events)) {
        /* print_r("Aucune compétition à venir."); */
    } 
    
    else {
        /* print_r("Des événements ont été trouvés."); */

        /**
        * Hydratation d'un tableau (pour exploitation ultérieure) 
        */
        $eventsArray = []; 
        $i = 0;

        foreach ($events as $event) {
            $i++;

            $start = $event->start->dateTime;
            if (empty($start)) {
                $start = $event->start->date;
            }

            $eventsArray[$i] = [
                "title" => $event->getSummary(), 
                "desc" => $event->getDescription(),
                "dateTime" => date_format(new DateTime($event->getStart()->dateTime), 'Y-m-d H:i:s'),
                "date" => dateToFrench($event->getStart()->dateTime,'j F Y')
            ];
            /* print_r($eventsArray); */
        }
        
    }



