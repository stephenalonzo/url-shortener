<x-layout>
    <section class="p-4">
        <div class="mx-auto space-y-8 flex flex-col items-center justify-center md:max-w-3xl">
            <h1 class="text-4xl font-bold text-center">Your SimpleURL is ready!</h1>
            <div
                class="p-4 rounded-md bg-gray-200 w-full space-y-3 flex flex-col items-center justify-center text-center">
                <p class="text-gray-500">Copy the short link and share it in messages, texts, posts, websites and other
                    locations.</p>
                <form action="/url/shorten" method="post" class="flex items-start" x-data="{
                    link: '{{ url('/') . '/' . $url->unique_id }}',
                    copied: false,
                    timeout: null,
                    copy() {
                        $clipboard(this.link)
                
                        this.copied = true
                
                        clearTimeout(this.timeout)
                
                        this.timeout = setTimeout(() => {
                            this.copied = false
                        }, 3000)
                    }
                }">
                    @csrf
                    <input type="text" name="url"
                        class="px-4 py-2 rounded-tl-md rounded-bl-md bg-white border border-gray-500 md:w-96"
                        placeholder="Enter the link here" value="{{ url('/') . '/' . $url->unique_id }}">
                    <button type="button"
                        class="px-4 py-2 rounded-tr-md rounded-br-md border border-blue-600 bg-blue-600 text-white hover:cursor-pointer hover:bg-blue-400 transition hover:border-blue-400"
                        x-on:click="copy" x-text="copied ? `Copied!` : `Copy Link`">Copy Link</button>
                </form>
                <p>Long URL: <a href="{{ $url->url }}" target="_blank"
                        class="text-blue-600 underline underline-offset-2">{{ $url->url }}</a></p>
                <p class="text-sm">Simple URLs are disabled after 30 days.</p>
            </div>
            <div class="space-y-3 text-center">
                <h3 class="text-2xl font-bold">It's simple and fast!</h3>
                <p class="text-gray-500">Simple URL allows users to instantly shorten long URLs into clean, shareable
                    links. Whether for personal use or business marketing, our tool ensures fast,
                    reliable, and secure link shortening.</p>
            </div>
            <div class="text-center grid grid-cols-2 gap-3 w-full">
                <div class="space-y-3 rounded-md border border-gray-300 p-3">
                    <i class="fa-regular fa-thumbs-up text-5xl text-gray-500"></i>
                    <h4 class="text-xl font-bold">Easy</h4>
                    <p class="text-gray-500">
                        SimpleURL is easy and fast, enter the long link to get your shortened link
                    </p>
                </div>
                <div class="space-y-3 rounded-md border border-gray-300 p-3">
                    <i class="fa-solid fa-link text-5xl text-gray-500"></i>
                    <h4 class="text-xl font-bold">Shortened</h4>
                    <p class="text-gray-500">
                        Use any link, no matter what size, SimpleURL always shortens
                    </p>
                </div>
                <div class="space-y-3 rounded-md border border-gray-300 p-3">
                    <i class="fa-solid fa-shield text-5xl text-gray-500"></i>
                    <h4 class="text-xl font-bold">Secured</h4>
                    <p class="text-gray-500">
                        It is fast and secure, our service has HTTPS protocol and data encryption
                    </p>
                </div>
                <div class="space-y-3 rounded-md border border-gray-300 p-3">
                    <i class="fa-solid fa-hand text-5xl text-gray-500"></i>
                    <h4 class="text-xl font-bold">Reliable</h4>
                    <p class="text-gray-500">
                        All links that try to disseminate spam, viruses and malware are deleted
                    </p>
                </div>
            </div>
        </div>
    </section>
</x-layout>
