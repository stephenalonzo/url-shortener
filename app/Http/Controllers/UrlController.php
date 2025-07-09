<?php

namespace App\Http\Controllers;

use App\Http\Requests\UrlRequest;
use App\Models\Url;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;

class UrlController extends Controller
{
    public function index()
    {
        $urls = Url::all();

        foreach ($urls as $url) {
            $date1 = new DateTime(date($url['created_at']));
            $date2 = new DateTime(date(now()));
            $interval = $date1->diff($date2);

            if ($interval->days >= 30) {
                Url::where('created_at', '<', Carbon::now()->subDays(30))->delete();
            }
        }

        return view('index');
    }

    public function store(UrlRequest $request)
    {
        $validated = $request->validated();

        $bytes = random_bytes(3);
        $unique_id = ucwords(bin2hex($bytes));

        $parsed = parse_url($validated['url'], PHP_URL_SCHEME);

        if ($parsed === 'https') {
            Url::create([
                'url' => $validated['url'],
                'unique_id' => $unique_id
            ]);

            return redirect('/url/shorten/')->with('unique_id', $unique_id);
        }

        return back()->with('error', '*Please enter a valid url');
    }

    public function show()
    {
        $urls = Url::where('unique_id', session('unique_id'))->get();

        foreach ($urls as $url) {
            return view('show', [
                'url' => $url
            ]);
        }

        return redirect('/');
    }

    public function redirectUrl(Url $url)
    {
        return redirect($url->url);
    }
}
