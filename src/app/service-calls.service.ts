import { Injectable } from '@angular/core';
import {HttpClient, HttpErrorResponse} from '@angular/common/http';
import {Observable, throwError} from 'rxjs';
import {catchError, map} from 'rxjs/operators';
import {PersonDetails} from './PersonDetails';

@Injectable({
  providedIn: 'root'
})
export class ServiceCallsService {

  baseUrl = 'http://localhost/api';

  constructor(private http: HttpClient) { }

storeDetails(person): Observable<any> {
  return this.http.post(`${this.baseUrl}/store`, { data: person })
  .pipe(map((res) => {
    console.log(person);
  }),
  catchError(this.handleError));
  }

  private handleError(error: HttpErrorResponse) {
    console.log(error);
    return throwError('Error! something went wrong.');
  }
}
