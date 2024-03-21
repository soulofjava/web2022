<div>
    <div class="flex flex-row justify-between mb-8">
        @for($index = 0; $index < 5; $index++) <div>
            <div id="iklan">
                <a href="" target="_blank" id="link-iklan{{ $index }}">
                    <img src="pic_trulli.jpg" id="gambar-iklan{{ $index }}" alt="ayopromo.com" style="
                    border: 1px solid #ddd;
                    border-radius: 4px;
                    padding: 5px;
                    width: 150px;
                    height: 150px;
                    ">
                </a>
            </div>
    </div>
    @endfor
</div>
</div>