// Mersimoy Gurmu
// Capstone Project Computer Science II 
#include <iostream>
using namespace std;
// Scale class
class Scale {
public:
	char major;
	char minor;
};
class key :public Scale {
public:
	void print() {
		char k, s;
		do {
			cout << "            Enter a Scale: ";
			cin >> s;
			if (s == 'M' || s == 'm') {
				cin >> k;
				if (s == 'M')
				{
					switch (k)
					{
					case 'C':
						cout << "            C MAJOR: C-D-E-F-G-A-B-C" << endl;
						break;
					case 'D':
						cout << "            D MAJOR: D-E-F#-G-A-B-C#-D" << endl;
						break;
					case 'E':
						cout << "            E MAJOR: E-F#-G#-A-B-C#-D#-E" << endl;
						break;
					case 'F':
						cout << "            F MAJOR: F-G-A-Bb-C-D-E-F" << endl;
						break;
					case 'G':
						cout << "            G MAJOR: G-A-B-C-D-E-F#-G" << endl;
						break;
					case 'A':
						cout << "            A MAJOR: A-B-C#-D-E-F#-G#-A" << endl;
						break;
					case 'B':
						cout << "            B MAJOR: B-C#-D#-E-F#-G#-A#-B" << endl;
						break;
				
					default:
						cout << "ERROR!" << endl;
				    }
					cout << endl;
				}
				if(s == 'm') {
					switch (k) {
					case 'C':
						cout << "            C minor: C-D-Eb-F-G-Ab-Bb-C" << endl;
						break;
					case 'D':
						cout << "            D minor: D-E-F-G-A-Bb-C-D" << endl;
						break;
					case 'E':
						cout << "            E minor: E-F#-G#-A#-B#-C-D-E" << endl;
						break;
					case 'F':
						cout << "            F minor: F-G-Ab-Bb-C-Db-Eb-F" << endl;
						break;
					case 'G':
						cout << "            G minor: G-A-Bb-C-D-Eb-F-G" << endl;
						break;
					case 'A':
						cout << "            A minor: A-B-C-D-E-F-G-A" << endl;
						break;
					case 'B':
						cout << "            B minor: B-C#-D-E-F#-G-A-B" << endl;
						break;
					default:
						cout << "ERROR!" << endl;
					}
					cout << endl;
				}
			}
		} while (s);
	}
};






