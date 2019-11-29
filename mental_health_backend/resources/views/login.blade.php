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
        <div><h2>Login</h2></div>
        <br>
        <form method="POST" action="/verify-login">
            <div class="form-group">
                <label for="inputEmail">Email address</label>
                <input type="email" name="email" class="form-control" id="inputEmail" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
                <label for="inputPassword">Password</label>
                <input type="password" name="password" class="form-control" id="inputPassword">
            </div>
            {{ csrf_field() }}
            @if($errors->any())
                <div class="alert alert-danger" role="alert">
                    {{$errors->first()}}
                </div>
            @endif
            <!--        <div class="form-check">-->
            <!--            <label class="form-check-label">-->
            <!--                <input class="form-check-input" type="checkbox" value="">-->
            <!--                Option one is this-->
            <!--                <span class="form-check-sign">-->
            <!--              <span class="check"></span>-->
            <!--          </span>-->
            <!--            </label>-->
            <!--        </div>-->

            <button id="btnSubmit" type="submit" class="btn btn-info">Submit</button>
        </form>
    </div>
</div>

@include("partials.scripts")
@include('partials.footer')
