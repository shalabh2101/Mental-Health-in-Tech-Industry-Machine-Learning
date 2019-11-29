@include('partials.header')

<div class="container">
    <div class="card" style="padding-top: 4%;
    padding-left: 6%;
    padding-right: 6%;
    padding-bottom: 5%;
    margin-top: 16%;
    margin-left: auto;
    margin-right: auto;
    max-width: 52%;">
        <div><h2>Register</h2></div>
        <br>
        <form action="/register" method="POST">
            <div class="form-group">
                <label for="inputEmail">Email address</label>
                <input type="email" name="email" class="form-control" id="inputEmail" aria-describedby="emailHelp">
                @if(!empty($error_messages['email']))
                    <span class="error">{{ $error_messages['email'][0] }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="inputUsername">Username</label>
                <input type="text" name="username" class="form-control" id="inputUsername">
                @if(!empty($error_messages['username']))
                    <span class="error">{{ $error_messages['username'][0] }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="inputPassword">Password</label>
                <input type="password" name="password" class="form-control" id="inputPassword">
                @if(!empty($error_messages['password']))
                    <span class="error">{{ $error_messages['password'][0] }}</span>
                @endif
            </div>
            {{ csrf_field() }}
            <!--        <div class="form-check">-->
            <!--            <label class="form-check-label">-->
            <!--                <input class="form-check-input" type="checkbox" value="">-->
            <!--                Option one is this-->
            <!--                <span class="form-check-sign">-->
            <!--              <span class="check"></span>-->
            <!--          </span>-->
            <!--            </label>-->
            <!--        </div>-->

            <button id="btnSubmit" type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>

@include("partials.scripts")
@include('partials.footer')
