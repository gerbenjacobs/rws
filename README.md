# Rijkswaterstaat library
This is a work in progress, but functioning..

If you want you can work on it, so am I.

#### Rijkswaterstaat?
Rijkswaterstaat is the agency in the Netherlands for infrastructure and environment, as such, they measure a lot of the water (mainly rivers) in the country. 

They publish these measurements as open data, however this data is designed for Dutch speaking people and very poorly formatted, that's why I created this library. Making open data really **open**!

## What is it?
So far it only retrieves the current sensors used by Rijkswaterstaat in 10 minute intervals. It contains 5 values as well as a prediction, if available.  
The rest of the datasets can be found here: http://www.rws.nl/rws/opendata/

## Results
It currently returns **458** measurements, mostly waterheight, but also temperature, speed, water debit and amount of chlorine, for example.

Here we see a result for a sensor in Baalhoek that measures the temperature, which got slightly warmer in 30 minutes:
```
     [0] => Array
        (
            [network] => LMW
            [location_code] => BAALb
            [unknown] => 
            [sensor_code] => TW10S
            [location_name] => Baalhoek b
            [sensor_name] => watertemp gemeten
            [measurement] => Celsius
            [time_started] => 2013-09-18T09:40:00+02:00
            [time_ended] => 2013-09-18T10:30:00+02:00
            [encoding] => ASCII
            [measurements] => Array
                (
                    [0] => Array
                        (
                            [time] => 2013-09-18T09:50:00+02:00
                            [measurement] => 17.4
                            [prediction] => 
                        )

                    [1] => Array
                        (
                            [time] => 2013-09-18T10:00:00+02:00
                            [measurement] => 17.3
                            [prediction] => 
                        )

                    [2] => Array
                        (
                            [time] => 2013-09-18T10:10:00+02:00
                            [measurement] => 17.7
                            [prediction] => 
                        )

                    [3] => Array
                        (
                            [time] => 2013-09-18T10:20:00+02:00
                            [measurement] => 17.8
                            [prediction] => 
                        )

                    [4] => Array
                        (
                            [time] => 2013-09-18T10:30:00+02:00
                            [measurement] => 17.8
                            [prediction] => 
                        )

                    [5] => Array
                        (
                            [time] => 2013-09-18T10:40:00+02:00
                            [measurement] => 17.8
                            [prediction] => 1
                        )

                )

            [location] => Array
                (
                    [locatie_omschrijving] => Baalhoek - boven - Westerschelde
                    [locatie] => BAALb
                    [x] => 51.365841
                    [y] => 4.102372
                    [zoom] => 11
                    [area] => ZuidWest
                )

        )
```

As you can see, this data still needs a bit of formatting and perhaps some cleaning up; having all the types of measurements as a reference and use indices instead of Dutch names.

## Idea
The idea is to perhaps one day put all the data in a database so you can query it with an API and have it return JSON.