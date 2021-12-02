<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style.css">
    {{-- <link rel="stylesheet" href="/css/all.min.css"> --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
    <title>{{ $title }}</title>
  </head>
  <body>

    @include('partials.navbar')
      <div class="jumbotron ">
        <div class="container">
          <br><br>
          <h2 class="text-4">Private Covid-19 <br> Vaccination System</h2>        
          <h3 class="color-g mt-4">COVID-19 Vaccine is Safe</h3>
          <!-- <img src="img/Delivery-rafiki.png" class=" img-deliver" alt=""> -->
          <!-- <img src="img/delivery-truck.jpg" class=" img-deliver" alt=""> -->
          <p class="pt-3">Get the Vaccine to save lives <br>  Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus, obcaecati  <br>  quam similique quia laudantium illo accusantium officiis laboriosam soluta cumque. <br> to Dolores aut doloremque sed provident voluptates, assumenda possimus! </p>        
          <button type="button" class="btn btn-lg btn-outline-primary mr-5">
            Read More
          </button>       
          <img id="img-background" src="img/4999291.png" class="img-vaccine" alt="">
        </div>   
        {{-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#a2d9ff" fill-opacity="1" d="M0,96L48,85.3C96,75,192,53,288,58.7C384,64,480,96,576,138.7C672,181,768,235,864,250.7C960,267,1056,245,1152,213.3C1248,181,1344,139,1392,117.3L1440,96L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg> --}}
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#a2d9ff" fill-opacity="1" d="M0,160L48,181.3C96,203,192,245,288,229.3C384,213,480,139,576,122.7C672,107,768,149,864,181.3C960,213,1056,235,1152,229.3C1248,224,1344,192,1392,176L1440,160L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>
        {{-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#c4c3c3" fill-opacity="1" d="M0,160L48,181.3C96,203,192,245,288,229.3C384,213,480,139,576,122.7C672,107,768,149,864,181.3C960,213,1056,235,1152,229.3C1248,224,1344,192,1392,176L1440,160L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg> --}}
      </div>
</div>
    {{-- <div class="container mt-4"> --}}
        @yield('container')
    {{-- </div> --}}

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    {{-- <script src="js/all.min.js" ></script> --}}

   
  </body>
</html>
