<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Carbon;

class ZoomController extends Controller
{
    public function viewzoom()
    {
        $client = new Client();

        $today = Carbon::now()->format('Y-m-d');

        $response = $client->get("https://api.zoom.us/v2/users/me/meetings", [
            'headers' => [
                'Authorization' => 'Bearer ' . $this->generateAccessToken(),
                'Content-Type' => 'application/json',
            ],
        ]);

        $data = json_decode($response->getBody(), true);

        // Filter pertemuan yang hanya terjadi hari ini
        $meetingsToday = array_filter($data['meetings'], function ($meeting) use ($today) {
            return Carbon::parse($meeting['start_time'])->format('Y-m-d') === $today;
        });

        return view('front.zoom.index', compact('meetingsToday'));
    }

    protected $apiKey = 'AFtp4s3KQ5m6ArheGFZHWw';
    protected $apiSecret = 'ChS6zIZ8UFmeyIP3ZPLk2TqyySzc0D0d';
    protected $baseUrl = 'https://zoom.us/';
    protected $accountID = 'fzTDFG_UTIm8f40l6xyI5A';

    public function createMeeting(Request $request)
    {
        // Waktu mulai dan selesai pertemuan yang akan dibuat
        $waktuMulai = Carbon::parse($request->jam_mulai);
        $waktuSelesai = Carbon::parse($request->jam_selesai);

        // Periksa apakah pertemuan yang baru dibuat bertabrakan dengan pertemuan yang sudah ada
        if ($this->checkMeetingConflict($waktuMulai, $waktuSelesai)) {
            return response()->json(['error' => 'Pertemuan bertabrakan dengan pertemuan yang sudah ada'], 400);
        }

        $tgl = date('Y-m-d\Th:i:00', strtotime($request->tanggal)) . 'Z';

        // Hitung perbedaan menit
        $perbedaanMenit = $waktuMulai->diffInMinutes($waktuSelesai);

        $client = new Client();

        $response = $client->post('https://api.zoom.us/v2/users/me/meetings', [
            'headers' => [
                'Authorization' => 'Bearer ' . $this->generateAccessToken(),
                'Content-Type' => 'application/json',
            ],
            'json' => [
                'topic' => $request->topik,
                'type' => 2, // 1 for Instant Meeting
                'start_time' => $tgl,
                'duration' => $perbedaanMenit
            ],
        ]);

        $data = json_decode($response->getBody(), true);
        // return redirect('permohonan-zoom');
        return response()->json($data);
    }

    // Fungsi untuk memeriksa konflik waktu pertemuan
    private function checkMeetingConflict($start_time, $end_time)
    {
        $client = new Client();

        $response = $client->get("https://api.zoom.us/v2/users/me/meetings", [
            'headers' => [
                'Authorization' => 'Bearer ' . $this->generateAccessToken(),
                'Content-Type' => 'application/json',
            ],
        ]);

        $meetings = json_decode($response->getBody(), true);

        foreach ($meetings['meetings'] as $meeting) {
            $meeting_start = Carbon::parse($meeting['start_time']);
            $meeting_end = $meeting_start->copy()->addMinutes($meeting['duration']);

            // Periksa jika waktu selesai pertemuan yang baru bertabrakan dengan waktu mulai pertemuan yang sudah ada
            if (($start_time >= $meeting_start && $start_time < $meeting_end) || ($end_time > $meeting_start && $end_time <= $meeting_end)) {
                return true;
            }
        }

        return false;
    }

    private function generateAccessToken()
    {
        $client = new Client();

        $response = $client->post($this->baseUrl . 'oauth/token', [
            'form_params' => [
                'grant_type' => 'account_credentials',
                'client_id' => $this->apiKey,
                'client_secret' => $this->apiSecret,
                'account_id' => $this->accountID,
            ],
        ]);

        $data = json_decode($response->getBody(), true);

        return $data['access_token'];
    }

    private function getMeetings()
    {
        $client = new Client();

        $response = $client->get("https://api.zoom.us/v2/users/me/meetings", [
            'headers' => [
                'Authorization' => 'Bearer ' . $this->generateAccessToken(),
                'Content-Type' => 'application/json',
            ],
        ]);

        $data = json_decode($response->getBody(), true);

        return $data['meetings'];
    }
}
