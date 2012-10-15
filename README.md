circuit-simulator
=================

This was a curriculum project that asked us to build a simulator for logical circuits. It had to be a system that is running on the server, and users keep queuing their submissions and each user gets a fixed time-slice of the simulator. They can work offline and create their circuits (using the downloadable open source editor called Logic Gate Simulator 1.4 - thanks to the open source software provided at http://www.kolls.net/gatesim).
The basic idea is that the user downloads the software (which has a simulator too, but we don't use it in this project), and makes his logic circuit using the available gates. Then, this circuit is saved as an XML file, which he uploads to our website. The user is queued till his execution time slice is there, and then his code is simulated for a particular amount of time. He can give various inputs, and he'll get the corresponding outputs.
The main requirement of this project was to implement logging of users, creating a time-shared simulator. So, we parsed the XML file uploaded by the user and use it to compute the result at the required time.

Note: This repo may contain various software's or codes (especially the CSS and JavaScript codes) that are written by someone else. I'd like to thank them and acknowledge their contribution. All logos used are properties of their respective owners.
