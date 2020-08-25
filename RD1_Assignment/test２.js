$(function () {
  $.ajax({
    type: "GET",
    url: "https://opendata.cwb.gov.tw/api/v1/rest/datastore/F-C0032-001?Authorization=CWB-0EF10C78-E76B-49E3-BD74-05B21416C3F5&sort=time",
    dataType: "xml",
    error: function (e) {
      console.log('oh no');
    },
    success: function (e) {
      var data = $(e).find('location');
      var num = data.length;
      var time = data.eq(0).find('time').text();
      var city = data.eq(0).find('parameter').eq(0).find('parameterValue').text();
      var town = data.eq(0).find('parameter').eq(2).find('parameterValue').text();
      console.log(time);
      console.log(city);
      console.log(town);
    }
  })
})
;
// fetch('https://opendata.cwb.gov.tw/api/v1/rest/datastore/F-C0032-001?Authorization=CWB-0EF10C78-E76B-49E3-BD74-05B21416C3F5&sort=time')
// .then(res => {
//     return res.json();
// }).then(result => {
//     let city = result.cwbopendata.location[14].parameter[0].parameterValue;
//     let temp = result.cwbopendata.location[14].weatherElement[3].elementValue.value;
//     console.log(`${city}的氣溫為 ${temp} 度 C`); // 得到 高雄市的氣溫為 29.30 度 C
// });
  