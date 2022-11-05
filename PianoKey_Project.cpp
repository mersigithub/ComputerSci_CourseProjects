// Mersimoy Gurmu
// Capstone Project Computer Science II
// Piano Keys App
#include <iostream>
#include "Scale.h"
#include "minorMajor.h"
using namespace std;

int main()
{
	key k;//object of Scale class
	Chord Cr;

	// Menu Selection that appear on the screen
	cout << endl;
	cout << "                   ********************************************" << endl;
	cout << "                   ********************************************" << endl;
	cout << "                   *****      WELCOME TO PIANO KEYS APP   *****" << endl;
	cout << "                   ********************************************" << endl;
	cout << "                   ********************************************" << endl;
	cout << endl;
	int input = 0;
	// 1- Check
	// 2- Build

	cout << "                            Enter your option:" << endl;
	cout << "                            [1]- Check the program" << endl;
	cout << "                            [2]- Build the program" << endl;

	do {
		cin >> input;
		if (input == 1) {
			cout << "                                    SELECT A SCALE" << endl;
			cout << "                                    [M] MAJOR" << endl;
			cout << "                                    [m] minor" << endl;
			cout << endl;
			cout << "                                    SELECT KEYS" << endl;// Select a key
			cout << "                                    C-D-E-F-G-A-B" << endl; // Keys option
			cout << endl;
			cout << endl;
			k.print();
		}
		if (input == 2)
		{
			cout << "                 Please select a scale" << endl;
			cout << "                 [1]- Major" << endl;
			cout << "                 [2]- Minor" << endl;
			int inp = 0;
			do {
				cin >> inp;

				if (inp == 1) {
					Cr.Major();
				}
				else if (inp == 2) {
					Cr.Minor();
				}
				else {
					cout << "Invalid Scale selected" << endl;
				}

			} while (inp);
		}

	} while (0);

	return 0;
}
