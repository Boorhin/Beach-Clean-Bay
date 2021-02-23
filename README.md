# Beach-Clean-Bay
Citizen science portal for recording weight of plastic collected

Beach-Clean-Bay aims at offering beachcleaners and organisation with an easy tool to record the weight of plastic they collect.
The database is hosted by plasticatbay.org and can be filled and recorded through the plasticatbay/research page. The code is still very rough but provide already essential overviews of the evolution of plastic pollution. The idea is to give the ability to other groups to integrate the tool into their own webpage. We also would like to use the registry of OpenStreetMap to match our database with it and also to contribute to their beach database. The code is functional but needs a lot of improvement to make it more user friendly and also eventually communicate with other databases. Help is welcomed.
## 'Structure' of the code
#### map view of the data (js + d3)
```
html Map.html
```

<p align="center">
  <img src="Screenshot from 2021-01-02 19-29-53.png" width="400">
</p>
#### graph of the evolution of pollution in the selected beach (js + d3)
```
html BeachReport.html
```

<p align="left">
  <img src="Screenshot from 2021-01-02 17-52-04.png" width="640">
</p>
### under development

#### An interface for registration of new beaches based on the openlayer js app querrying overpass turbo (the backbone of OpenStreetMap)
```
html openlayermap.html 
```
