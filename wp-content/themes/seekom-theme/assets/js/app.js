// const app = {


//         init: () => {
			
//    let lat = 53.835640;
//             let lon = -2.216650;
//             let key = 'c1cbc8d86c51895c71715d8ed5b7e3fa';
//             let lang = 'en';
//             let units = 'metric';
//             let url = `https://api.openweathermap.org/data/2.5/onecall?lat=${lat}&lon=${lon}&appid=${key}&units=${units}&lang=${lang}`;

           
//           fetch(url)
//                 .then((resp) => {
				 
//                     if (!resp.ok) throw new Error(resp.statusText);
//                     return resp.json();
//                 })
//                 .then((data) => {
//                     app.showWeather(data);
//                 })
//                 .catch(console.err);
//         },

//         wtf: (err) => {
//             //geolocation failed
//             console.error(err);
//         },
//         showWeather: (resp) => {
//             console.log(resp);
//             let row = document.querySelector('.weather.row');
//             //clear out the old weather and add the new
//             // row.innerHTML = '';
//             row.innerHTML = resp.daily
//                 .map((day, idx) => {
//                     if (idx <= 2) {
//                         let dt = new Date(day.dt * 1000); //timestamp * 1000
//                         let sr = new Date(day.sunrise * 1000).toTimeString();
//                         let ss = new Date(day.sunset * 1000).toTimeString();
//                         return `<div class="col-12  col-lg-4">
//                                     <div class="card mb-3 ">
//                                         <div class="row g-0 ">
                                            
//                                             <div class="col-3 text-center bg-light">
//                                                 <h6 class="card-title p-2 bg-green"><strong>${dt.toDateString()}</strong></h6>
                                                
//                                                 <img
//                                                     src="http://openweathermap.org/img/wn/${
//                                                     day.weather[0].icon
//                                                     }@4x.png"
//                                                     class="card-img-top"
//                                                     alt="${day.weather[0].description}"
//                                                 />
//                                                 <h5 class="card-title p-2"><strong>${day.weather[0].main}</strong></h5>
//                                             </div>
//                                                 <div class="col-5 p-2">
                                                    
                                                       
//                                                         <p class="card-text">High ${day.temp.max}&deg;C Low ${
//                                                             day.temp.min
//                                                             }&deg;C</p>
//                                                         <p class="card-text">High Feels like ${
//                                                         day.feels_like.day
//                                                         }&deg;C</p>
//                                                         <p class="card-text">Pressure ${day.pressure}mb</p>
//                                                         <p class="card-text">Humidity ${day.humidity}%</p>
                                                   
//                                                 </div>
                                            
//                                             <div class="col-4 p-2">
                                                
                                               
//                                                 <p class="card-text">UV Index ${day.uvi}</p>
//                                                 <p class="card-text">Precipitation ${day.pop * 100}%</p>
//                                                 <p class="card-text">Dewpoint ${day.dew_point}</p>
//                                                 <p class="card-text">Wind ${day.wind_speed}m/s, ${
//                                                     day.wind_deg
//                                                 }&deg;</p>
//                                             </div>
                                            
//                                             <!-- <div class="p-2 text-center bg-green">
//                                              <p class="card-text">Sunrise ${sr}</p>
//                                          <p class="card-text">Sunset ${ss}</p>
//                                              </div> -->
//                                         </div>
//                                     </div>
//                                  </div>`;
//                     }
//                 })
//                 .join(' ');
//         },
//     };
//     window.addEventListener('load', () => {
//         app.init();
//     });