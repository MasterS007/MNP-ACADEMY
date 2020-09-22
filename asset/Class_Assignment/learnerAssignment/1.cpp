#include <iostream>

using namespace std;

void SelectionSort(int A[], int N);

int main()
{
    int A[100],N,i;

    cout<<"Number of elements:"<<endl;
    cin>>N;


    cout<<"The unsorted array:"<<endl;
    for(i=1;i<=N;i++)
    {
        cin>>A[i];

    }

    SelectionSort(A,N);

    cout<<"the sorted array:"<<endl;
    for(i=1;i<=N;i++)
    {
        cout<<A[i]<<" ";
    }

    return 0;

}


void SelectionSort(int A[], int N)
{
    int i, j, smallsub, temp;

    for(i=1; i<=N-1;i++)
    {
        smallsub=i;


        for(j=i+1;j<=N;j++)
        {
            if(A[j]<A[smallsub])
                {smallsub=j;}
        }

        temp=A[i];
        A[i]=A[smallsub];
        A[smallsub]=temp;
    }
}
