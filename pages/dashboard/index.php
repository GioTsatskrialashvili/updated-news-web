<main>
    <div class="container-header">
        <h2>Subscribe</h2>
        <button onclick="drawText()" class='btn'>draw text</button>
    </div>
    <div class="content" id="content">
        <form onsubmit="subscribe(); return false" id="subscribe-form" >
            <div class="form-group">
            
                <label for="">Enter your name to subscribe</label>
                <input type="text" name="name" id="subscribe-name" style="margin-bottom:10px;">

                <label for="">Enter your email </label>
                <input type="text" name="email" id="subscribe-email" style="margin-bottom:10px;">

                <label for="">Enter your phone number</label>
                <input type="text" name="phonenumber" id="subscribe-number" style="margin-bottom:10px;">
            </div>
            <div class="form-group">
            
                <button class="btn submit">Subscribe</button>
            </div>
        </form>
        <div id="msg">
            Thank you!
            <button class="btn" onclick="resubscribe()">Fill another form</button>
        </div>
    </div>
</main>